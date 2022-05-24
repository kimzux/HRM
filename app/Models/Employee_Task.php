<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee_Task extends  Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'employee_task';

    protected $fillable = [
		'id','employee_id', 'task_id',    
	];
    public function task()
	{
		return $this->belongsTo(Task::class);
	}

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}
	
}
