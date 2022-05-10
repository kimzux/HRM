<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplinary extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'disciplinary';

    protected $fillable = [
		'employee_id',  'disciplinary_action','title','details',  
	];
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
    }
}
