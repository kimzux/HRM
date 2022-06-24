<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdeimRetire extends Model
{
    use HasFactory;
    protected $table = 'perdeimretires';
   
    protected $fillable = [
		     'employee_id','perdeim_id','amount_used', 'status','file_url','file_title'  
	];

  public function Perdeim()
  {
      return $this->belongsTo(Perdeim::class);
  }
  public function employee()
  {
      return $this->belongsTo(Employee::class);
  }
}
