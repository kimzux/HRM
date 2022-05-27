<?php

namespace App\Http\Controllers;
<<<<<<< HEAD

=======
use App\Models\Asset;
use RealRashid\SweetAlert\Facades\Alert;
>>>>>>> 065f7495ec549ff55a34e837f931ed0e291006d1
use Illuminate\Http\Request;

class AssetController extends Controller
{
<<<<<<< HEAD
    //
=======
    public function index()
    {
        $asset = Asset::all();

        return view('asset.asset_category.index', compact('asset'));
    
    }
    public function store(Request $request)
  {
    
      $asset = new Asset();
      $asset->category_type = request('cattype');
      $asset->category_name = request('catname');
      $asset->save();
      Alert::success('Success!', 'Successfully added');
      return back();

    }
    public function edit(Request $request, $id)
    {
        $asset = Asset::findOrFail($id);

        return view('asset.asset_category.edit', compact('asset'));
    }
    public function update(Request $request, $id)
    {
  $validatedData =  $request->validate([
      'category_type' => 'required',
       'category_name'=> 'required',
      
  ]);
  
  Asset::whereId($id)->update($validatedData);
  Alert::success('Success!', 'Successfully updated');
  return redirect()->route('asset.index');
}
>>>>>>> 065f7495ec549ff55a34e837f931ed0e291006d1
}
