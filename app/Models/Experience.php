<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model 
{
    use HasFactory;
    protected $table = 'experience';
    public $timestamps = false;
    protected $fillable = [
		'employee_id','exp_company','exp_com_position' ,'comp_address','work_duration' ,
	];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
    }
  

}