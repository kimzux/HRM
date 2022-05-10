<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHolidayTable extends Migration {

	public function up()
	{
		Schema::create('holiday', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 200);
			$table->date('date');
		});
	}

	public function down()
	{
		Schema::drop('holiday');
	}
}