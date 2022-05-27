<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $table = 'asset';
    public $timestamps = false;
    protected $fillable = [
		'id','category_name','category_type',
	];

}
