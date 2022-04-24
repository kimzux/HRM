<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'designation';

    protected $fillable = [
		'des_name',    
	];

    public function employee()
    {
        return $this->hasMany('Employee');
    }

}
