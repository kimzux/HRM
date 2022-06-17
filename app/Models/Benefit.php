<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;
    protected $table = 'benefit';
   
    protected $fillable = [
		'employee_id','name','amount',   
	];

  public function Payrol()
  {
      return $this->belongsTo('Payrol');
  }
  public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}