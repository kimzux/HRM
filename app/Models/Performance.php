<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;
    protected $table = 'performance';
   
    protected $fillable = [
		     'employee_id','goals','expectation', 'start_date'  ,'end_date', 'timeline'
	];

 
  public function employee()
  {
      return $this->belongsTo(Employee::class);
  }
  public function rate()
{
    return $this->hasMany(Rate::class);
}
}
