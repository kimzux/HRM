<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $table = 'salary';
   
    protected $fillable = [
		     'employee_id','basic_salary',   
	];

  public function payroll()
  {
      return $this->belongsTo(Payroll::class);
  }
  public function employee()
  {
      return $this->belongsTo(Employee::class);
  }
}
