<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExperienceTable extends Migration {

	public function up()
	{
		Schema::create('experience', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->string('exp_company', 100);
			$table->string('exp_com_position', 100);
			$table->string('comp_address', 200);
			$table->string('work_duration', 200);
		});
	}

	public function down()
	{
		Schema::drop('experience');
	}
}