<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perdeim extends Model
{
    use HasFactory;
    protected $table = 'perdeim';
   
    protected $fillable = [
		     'employee_id','reason','amount', 'status'  ,'retire_status'
	];

  public function Perdeimretires()
  {
      return $this->hasOne(PerdeimRetire::class);
  }
  public function employee()
  {
      return $this->belongsTo(Employee::class);
  }
}
