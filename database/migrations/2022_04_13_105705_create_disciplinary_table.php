<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDisciplinaryTable extends Migration {

	public function up()
	{
		Schema::create('disciplinary', function(Blueprint $table) {
			$table->increments('id');
			$table->foreignId('employee_id')->constrained('employee');
			$table->string('disciplinary_action', 200);
			$table->string('title', 200);
			$table->string('details', 200);
		
		});
	}

	public function down()
	{
		Schema::drop('disciplinary');
	}
}