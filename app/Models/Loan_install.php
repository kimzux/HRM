<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan_install extends Model
{
    use HasFactory;
    protected $table = 'loan';
    public $timestamps = false;
    protected $fillable = [
		'id','','employee_id','loan_id','date','receiver','install_number','note','amount_pay',
	];
   
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    public function loan()
    {
        return $this->belongsTo(Loan::class,'loan_id');
    }
    public function scopeSumQuantity(Builder $query)
	{
		return $query->selectRaw("SUM(id) id, loan_id, SUM(install_amount) as total_pay")
			->groupBy('loan_id');
	}
    
}
