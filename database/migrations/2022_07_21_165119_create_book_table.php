<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookTable extends Migration {

	public function up()
	{
		Schema::create('book', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->foreignId('employee_id')->constrained('employee');
			$table->foreignId('room_id')->constrained('room');
			$table->date('reservation_date', 15,2);
			$table->dateTime('time_in');
			$table->dateTime('time_out');
			$table->string('status',200);
		});
	}

	public function down()
	{
		Schema::drop('book');
	}
}