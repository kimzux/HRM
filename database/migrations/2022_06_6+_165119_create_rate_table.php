<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRateTable extends Migration {

	public function up()
	{
		Schema::create('rate', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->foreignId('performance_id')->constrained('performance');
			$table->string('name', 200);
			$table->double('rate');
			$table->string('comment', 200);
			
		});
	}

	public function down()
	{
		Schema::drop('rate');
	}
}