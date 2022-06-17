<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeductionTable extends Migration {

	public function up()
	{
		Schema::create('deduction', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->foreignId('employee_id')->constrained('employee');
			$table->decimal('total_deduction', 5,2);
			$table->string('name', 200);
			$table->decimal('amount', 5,2);
		});
	}

	public function down()
	{
		Schema::drop('deduction');
	}
}