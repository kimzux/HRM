<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistic extends Model
{
    use HasFactory;
    protected $table = 'logistic';
    public $timestamps = false;
    protected $fillable = [
		'id','project_id','asset_id','employee_id','task_id','','startdate','enddate','remark','quantity',
	];
    public function task()
  {
      return $this->hasMany('Task');
  }
  public function field()
  {
      return $this->hasMany('Field');
  }
}
