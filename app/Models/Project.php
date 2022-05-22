<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';
    public $timestamps = false;
    protected $fillable = [
		'id','project_title','project_startdate','project_enddate','details','project_summary','project_status', 
	];
}
