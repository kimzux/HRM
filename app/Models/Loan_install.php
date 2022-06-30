<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan_install extends Model
{
    use HasFactory;
    protected $table = 'loan_install';
    public $timestamps = false;
    protected $fillable = [
		'id','loan_id','date','receiver','install_number','note','amount_pay',
	];
   
    public function loan()
    {
        return $this->belongsTo('App\Models\Loan', 'loan_id', 'id');
    }
   
}
