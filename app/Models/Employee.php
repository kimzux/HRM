<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Employee extends Model
{
    use HasFactory;
    use Notifiable;
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
        return $this->hasMany(User::class,'id');
    }

    public function education()
    {
        return $this->hasMany('Education');
    }
    public function bank_info()
    {
        return $this->hasOne(Bank_info::class,'employee_id');
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
  public function logsupport()
  {
      return $this->hasMany('Logsupport');
  }
public function loan()
{
    return $this->hasMany(Loan::class);
}
public function salary()
{
    return $this->hasOne(Salary::class);
}
public function workOvertime()
{
    return $this->hasMany(WorkOverTime::class);
}
  
public function department()
{
    return $this->belongsTo(Department::class);
}
public function deduction()
{
    return $this->hasMany(EmployeeDeduction::class);
}
public function benefit()
{
    return $this->hasMany(EmployeeBenefit::class);

}
public function performance()
{
    return $this->hasMany(Performance::class);
}
public function book()
{
    return $this->hasMany('Book');
}
public function payslip()
{
    return $this->hasMany('Payslip');
}
public function overtime()
  {
    return $this->hasMany(WorkOverTime::class);
}
public function designation()
{
    return $this->belongsTo(Designation::class);
}

public function getFullNameAttribute()
{
    return "{$this->first_name} {$this->last_name}";
}

}

