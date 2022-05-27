<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $table = 'field';
    public $timestamps = false;
    protected $fillable = [
		'id','employee_id','project_id','field_location','field_startdate','field_enddate','field_totaldays','notes', 'status',  'return_date',
	];
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
    }
    
}
