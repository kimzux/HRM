<?php

namespace App\Http\Controllers;
use App\Models\Asset;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Assetlist;
use Illuminate\Http\Request;

class AssetListController extends Controller
{
    public function index()
    {
  
      $assetlist= Assetlist::with('asset')->get();
      $ass = Asset::select('id', 'category_name')->get();
      return view('asset.asset_list.index',  ['assetlist'=> $assetlist,'ass'=> $ass]);
    }
    public function store(Request $request)
    {
      
        $asset_list = new Assetlist();
        $asset_list->asset_name = request('asset_name');
        $asset_list->asset_id = request('catid');
        $asset_list->asset_brand = request('brand');
        $asset_list->asset_model = request('model');
        $asset_list->asset_code = request('code');
        $asset_list->configuration= request('config');
        $asset_list->purchase_date= request('purchase');
        $asset_list->price = request('price');
        $asset_list->quantity = request('pqty');
        $asset_list->save();
        Alert::success('Success!', 'Successfully added');
        return back();
  
      }
      public function edit($id)
    {
      
        $assetlist= Assetlist::findOrFail($id);
        $asset = Asset::select('id', 'category_name')->get();
        return view('asset.asset_list.edit', ['assetlist'=> $assetlist,'asset'=> $asset]);
    }
    public function update(Request $request, Assetlist $assetlist)

    {
  
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
  
  
        ]);
  
    
  
        $assetlist->update($request->all());
  
    
        Alert::success('Success!', 'Successfully updated');
        return redirect()->route('assetlist.index');
       
  
    }
}
