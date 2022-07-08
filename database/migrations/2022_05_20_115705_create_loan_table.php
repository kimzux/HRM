<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoanTable extends Migration {

	public function up()
	{
		Schema::create('loan', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->double('amount', 10, 2);
			$table->timestamps();
			$table->double('period');
			$table->double('install_amount', 15,2)->nullable();
			$table->double('total_pay', 10, 2)->nullable();
			$table->double('total_due', 10, 2)->nullable();
			$table->double('loan_no')->unique();
			$table->boolean('status')->nullable();
			$table->string('loan_detail', 300);
		});
	}

	public function down()
	{
		Schema::drop('loan');
	}
}