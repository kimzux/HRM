<?php

namespace App\Http\Controllers;

use App\Models\Assetlist;
use App\Models\Employee;
use App\Models\EmployeeAsset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeAssetController extends Controller
{
    public function index($asset_id)
    {
        $asset_list = Assetlist::where('id', $asset_id)->first();
        if ($asset_list) {
            $employees = Employee::select('id', 'first_name', 'last_name')->orderBy('em_joining_date', 'DESC')->get();
            return view('asset.asset_list.asset-assigning', compact('asset_list', 'employees'));
        }
        Alert::danger('danger!', 'Data not found!');
        return redirect()->back();
    }
    public function store(Request $request, $asset_id)
    {
        $request->validate([
            'employee_id' => 'required',
            'serial_number' => 'required',
            'status' => 'required',
        ]);
        $assetlist = Assetlist::where('id', $asset_id)->first();

        if ($assetlist) {
            $request->merge([
                'assetlist_id' => $assetlist->id
            ]);
            if ($assetlist->remain_quantity > 0) {
                DB::beginTransaction();
                $isAssigned = EmployeeAsset::where('assetlist_id', $assetlist->id)
                    ->where('serial_number', $request->serial_number)
                    ->where('status', 'assigned')
                    ->exists();
                if ($isAssigned) {
                    Alert::info('Info!', 'Asset already assigned to employee!');
                    return redirect()->back();
                } else {
                    $created =  EmployeeAsset::create($request->except('_token'));
                    if ($created) {
                        $assetlist->update([
                            'remain_quantity' => ($assetlist->remain_quantity - 1)
                        ]);
                    }
                    DB::commit();
                    Alert::success('success!', 'Asset Assigned');
                    return redirect()->back();
                }
            } else {
                Alert::error('error!', 'Asset out of stock');
                return redirect()->back();
            }
        }
        Alert::error('error!', 'Data not found');
        return redirect()->back();
    }
    public function edit($asset_id, $employee_asset_id)
    {
    }
    public function show($asset_id, $employee_asset_id)
    {
    }
    public function update(Request $request, $asset_id, $employee_asset_id)
    {
    }
    public function returned($asset_id, $employee_asset_id)
    {
        $employee_asset = EmployeeAsset::where('id', $employee_asset_id)->whereHas("assetlist", function ($q) use ($asset_id) {
            return $q->where('assetlist_id', $asset_id);
        })->where('status', '!=', 'returned')->first();

        if ($employee_asset) {
            DB::beginTransaction();
            $updated =  $employee_asset->update([
                'status' => 'returned',
                'return_date' => Carbon::now()->format('Y-m-d')
            ]);
            $employee_asset->assetlist->update([
                'remain_quantity' => ($employee_asset->assetlist->remain_quantity + 1)
            ]);
            DB::commit();
            Alert::success('success!', 'Asset Returned');
            return redirect()->back();
        }
        Alert::error('error!', 'Data not found');
        return redirect()->back();

    }
}
