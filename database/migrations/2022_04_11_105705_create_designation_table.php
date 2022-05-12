<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDesignationTable extends Migration {

	public function up()
	{
		Schema::create('designation', function(Blueprint $table) {
			$table->id();
			$table->string('des_name', 100);
		});
	}

	public function down()
	{
		Schema::drop('designation');
	}
}