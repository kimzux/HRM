<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table = 'education';
    public $timestamps = false;
    protected $fillable = [
		'employee_id','education_type','institute' ,'result','year' ,
	];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
    }
}
