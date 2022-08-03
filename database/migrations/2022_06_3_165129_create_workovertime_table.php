<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkOverTimeTable extends Migration {

	public function up()
	{
		Schema::create('workovertime', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->foreignId('employee_id')->constrained('employee');
			$table->string('month',100);
			$table->double('total_hours');
			$table->string('type',100);
			$table->string('file_url', 500);
			$table->boolean('status')->nullable();
			$table->double('amount', 15,2)->nullable();
			
			
		});
	}

	public function down()
	{
		Schema::drop('workovertime');
	}
}