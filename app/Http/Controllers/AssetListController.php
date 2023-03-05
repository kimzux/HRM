<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Assetlist;
use App\Models\Depreciation;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetListController extends Controller
{
    public function index()
    {
        abort_if(Auth::user()->cannot('view assetlist'), 403, 'Access Denied');
        $assetlist = Assetlist::with('asset')->get();
        $ass = Asset::select('id', 'category_name')->get();
        return view('asset.asset_list.index',  ['assetlist' => $assetlist, 'ass' => $ass]);
    }

    public function store(Request $request)
    {
        abort_if(Auth::user()->cannot('create assetlist'), 403, 'Access Denied');
        $asset_list = new Assetlist();
        $asset_list->asset_name = request('asset_name');
        $asset_list->asset_id = request('catid');
        $asset_list->asset_brand = request('brand');
        $asset_list->asset_model = request('model');
        $asset_list->asset_code = request('code');
        $asset_list->configuration = request('config');
        $asset_list->purchase_date = request('purchase');
        $asset_list->price = request('price');
        $asset_list->quantity = request('pqty');
        $asset_list->remain_quantity = request('pqty');
        $asset_list->save();
        Alert::success('Success!', 'Successfully added');
        return back();
    }

    public function edit($id)
    {
        abort_if(Auth::user()->cannot('edit assetlist'), 403, 'Access Denied');
        $assetlist = Assetlist::findOrFail($id);
        $asset = Asset::select('id', 'category_name')->get();
        return view('asset.asset_list.edit', ['assetlist' => $assetlist, 'asset' => $asset]);
    }

    public function update(Request $request, Assetlist $assetlist)
    {

        abort_if(Auth::user()->cannot('update assetlist'), 403, 'Access Denied');
        $request->validate([
            'asset_name' => 'required',
            'category_name' => 'required',
            'asset_brand' => 'required',
            'asset_model' => 'required',
            'asset_code' => 'required',
            'configuration' => 'required',
            'purchase_date' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'depr_rate' => 'nullable',
            'depr_interval' => 'nullable',
        ]);
        $assigedAsset =  $assetlist->quantity - $assetlist->remain_quantity;
        if ($request->quantity >= $assigedAsset) {
            $assetlist->update($request->all());
            Alert::success('Success!', 'Successfully updated');
            return redirect()->route('assetlist.index');
        } else {
            Alert::warning('Warning!', 'Quantity add is less than assigned assets!');
            return redirect()->back();
        }
    }
    public function viewDepreciation($asset_id)
    {
        $asset_list = Assetlist::where('id', $asset_id)->first();
        if ($asset_list) {
            return view('asset.asset_list.depreciation-list', compact('asset_list'));
        }
        Alert::danger('danger!', 'Data not found!');

        return redirect()->back();
    }
    public function addDepreciation($asset_id)
    {

        $asset_list = Assetlist::where('id', $asset_id)->first();
        if ($asset_list) {
            if ($asset_list->depr_interval && $asset_list->depr_rate) {
                $purchase_date = Carbon::createFromFormat('Y-m-d', $asset_list->purchase_date);
                // $currentTime = Carbon::createFromFormat('Y-m-d', '2023-01-02');
                $currentTime = Carbon::now();
                $yearDifference = $currentTime->diffInYears($purchase_date);
                $depreciation_interval  = $asset_list->depr_interval;
                if ($yearDifference >= $depreciation_interval) {
                    $depreciation_value = 0;
                    $purchase_price = $asset_list->price;
                    $depreciation_rate = $asset_list->depr_rate;
                    if ($depreciation_rate != null) {
                        $depreciation_value = $yearDifference * $purchase_price * ($depreciation_rate / 100);
                    }
                    $markert_value = (float)$purchase_price - (float)$depreciation_value;
                    Depreciation::firstOrCreate([
                        'assetlist_id' => $asset_list->id,
                        'depr_value' => $markert_value,
                        'interval' => $yearDifference,

                    ]);
                    Alert::success('success!', 'Asset depreciate!');
                    return redirect()->back();
                }
            }
        }
        Alert::info('info!', 'Asset doesn\'t depreciate!');

        return redirect()->back();
    }
}
