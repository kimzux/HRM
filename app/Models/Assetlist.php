<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assetlist extends Model
{
    use HasFactory;
    protected $table = 'assetlist';
    public $timestamps = false;
    protected $fillable = [
		'id','asset_id','asset_name','asset_model','asset_brand','asset_code','configuration','purchase_date','price','quantity',
	];
  
  public function asset()
  {
      return $this->belongsTo('App\Models\Asset', 'asset_id', 'id');
  }
}
