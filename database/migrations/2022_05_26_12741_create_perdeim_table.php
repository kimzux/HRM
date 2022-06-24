<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerdeimTable extends Migration {

	public function up()
	{
		Schema::create('perdeim', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->foreignId('employee_id')->constrained('employee');
			$table->double('amount', 15,2);
			$table->text('reason');
			$table->boolean('status')->nullable();
			$table->boolean('retire_status')->nullable(); // approved = 1, pending = null, Reject= 0
		});
	}

	public function down()
	{
		Schema::drop('perdeim');
	}
}