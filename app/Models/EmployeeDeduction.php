<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDeduction extends Model
{
    use HasFactory;
    protected $table = 'employee_deduction';
   
    protected $fillable = [
		     'employee_id','deduction_id','effective_date','amount',   
	];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function deduction()
    {
        return $this->belongsTo(Deduction::class);
    }
    public function payslip()
  {
      return $this->belongsTo('Payslip');
  }
}
