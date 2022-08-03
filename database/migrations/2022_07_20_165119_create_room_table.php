<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomTable extends Migration {

	public function up()
	{
		Schema::create('room', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('room_no');
			$table->double('size', 2);
			
		});
	}

	public function down()
	{
		Schema::drop('room');
	}
}