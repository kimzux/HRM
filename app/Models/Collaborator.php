<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Collaborator extends Pivot
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'collaborator';

    protected $fillable = [
		'id','employee_id', 'task_id',    
	];
    public function task()
	{
		return $this->belongsTo('App\Task');
	}

	public function Employment()
	{
		return $this->belongsTo('App\Employment');
	}
	
}
