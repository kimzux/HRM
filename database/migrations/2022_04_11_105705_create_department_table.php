<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartmentTable extends Migration {

	public function up()
	{
		Schema::create('department', function(Blueprint $table) {
			$table->id();
			$table->string('dep_name', 100);
		
		});
	}

	public function down()
	{
		Schema::drop('department');
	}
}