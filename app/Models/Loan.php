<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $table = 'loan';
    public $timestamps = false;
    protected $fillable = [
		'id','','employee_id','amount','period','install_amount','status','loan_detail','total_pay','total_due',
	];
   
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function loan_install()
    {
        return $this->hasMany(Loan_install::class);
    }
    
}
