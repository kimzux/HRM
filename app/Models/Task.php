<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'task';
    public $timestamps = false;
    protected $fillable = [
		'id','employee_id','project_id','task_title','task_startdate','task_enddate','task_details','task_status', 'task_type',
	];
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function employee_task()
    {
        return $this->hasMany(Employee_Task::class);
    }
    public function logistic()
    {
        return $this->hasMany('Logistic');
    }
    
}
