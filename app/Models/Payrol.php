<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payrol extends Model
{
    use HasFactory;
    protected $table = 'payrol';
    protected $fillable = [
		'id','employee_id','loan_id','deduction_id','benefit_id','month','basic_salary','ework_overtime','final_salary','status','pay_date',
        'pay_type',    
	];
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
    }
    public function deduction()
{
    return $this->hasMany(Deduction::class);
}
public function benefit()
{
    return $this->hasMany(Benefit::class);
}
}
