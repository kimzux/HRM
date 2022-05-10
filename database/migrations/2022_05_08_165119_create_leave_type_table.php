<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeaveTypeTable extends Migration {

	public function up()
	{
		Schema::create('leave_type', function(Blueprint $table) {
			$table->increments('id');
			$table->string('leavename', 200);
			$table->double('day_no');
		});
	}

	public function down()
	{
		Schema::drop('leave_type');
	}
}