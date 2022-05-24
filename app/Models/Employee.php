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

    public function education()
    {
        return $this->hasMany('Education');
    }
    public function bank_info()
    {
        return $this->hasOne('Bank_info');
    }
    public function employee_file()
    {
        return $this->hasMany('Employee_file');
    }
    public function disciplinary()
    {
        return $this->hasMany('Disciplinary');
    }
    public function leave_application()
    {
        return $this->hasMany('Leave_application');
    }
    public function earn_leave()
    {
        return $this->hasMany('Earn_leave');
    }
    public function Task()
    {
        return $this->hasMany(Task::class);
    }
    public function field()
  {
      return $this->hasMany('Field');
  }
  public function employee_task()
  {
    return $this->hasMany(Employee_Task::class);
  }
}
