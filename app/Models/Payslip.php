<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    use HasFactory;
    protected $table = 'payslip';
    protected $fillable = [ 'employee_id', 'payroll_id', 'salary', 'allowance_amount','deduction_amount','net_pay', 
];

public function employee()
{
    return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
}
public function payroll()
{
    return $this->belongsTo('App\Models\Payroll', 'payroll_id', 'id');
}






}
