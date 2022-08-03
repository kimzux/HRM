<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
   
    protected $fillable = [
		     'employee_id','room_id','reservation_date','time_in','time_out',   
	];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
