<?php

namespace App\Http\Controllers;
use App\Models\Asset;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
  public function index()
    {
        abort_if(Auth::user()->cannot('view category'), 403, 'Access Denied');
        $asset = Asset::all();
        return view('asset.asset_category.index', compact('asset'));
    }

  public function store(Request $request)
    {
       abort_if(Auth::user()->cannot('cretate category'), 403, 'Access Denied');
       $asset = new Asset();
       $asset->category_type = request('cattype');
       $asset->category_name = request('catname');
       $asset->save();
       Alert::success('Success!', 'Successfully added');
       return back();
    }

  public function edit(Request $request, $id)
    {
      abort_if(Auth::user()->cannot('edit category'), 403, 'Access Denied');
      $asset = Asset::findOrFail($id);
      return view('asset.asset_category.edit', compact('asset'));
    }

  public function update(Request $request, $id)
    {
      abort_if(Auth::user()->cannot('update category'), 403, 'Access Denied');
      $validatedData =  $request->validate(['category_type' => 'required','category_name'=> 'required',]);
      Asset::whereId($id)->update($validatedData);
      Alert::success('Success!', 'Successfully updated');
      return redirect()->route('asset.index');
    }


}