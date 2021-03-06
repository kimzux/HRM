<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'setting';
    public $timestamps = false;
    protected $fillable = [
		'id','description','email_system','phone_number','link',
	];
   
}
