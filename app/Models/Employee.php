<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    public $timestamps = false;
    protected $fillable = [
		'id','email','first_name','last_name','designation_id','department_id','em_code','em_address','status','em_gender',
        'em_phone','em_birthday','em_joining_date','em_contract_end','em_nid','em_image',    
	];


    public function experience()
    {
        return $this->hasMany('Experience');
    }
    public function user()
    {
        return $this->belongsTo('User');
    }

}
