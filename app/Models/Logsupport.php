<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logsupport extends Model
{
    use HasFactory;
    protected $table = 'logsupport';
    public $timestamps = false;
    protected $fillable = [
		'id','project_id','logistic_id','employee_id','task_id','','startdate','enddate','remark','quantity','remain_quantity',
	];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function logistic()
    {
        return $this->belongsTo(Logistic::class);
    }
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    
}
