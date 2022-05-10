<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Employee_file extends Model 
{
    use HasFactory;
    protected $table = 'employee_file';
    public $timestamps = false;
    protected $fillable = [
		'employee_id','file_title','file_url' ,   
	];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
    }



}