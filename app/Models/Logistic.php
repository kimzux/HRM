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
		'id','','logistic_name','description','entry_date','logistic_sup','quantity',
	];
   
    public function logsupport()
    {
        return $this->hasMany(Logsupport::class);
    }
    

}
