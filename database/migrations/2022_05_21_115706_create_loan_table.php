<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoanTable extends Migration {

	public function up()
	{
		Schema::create('loan', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->double('amount', 10, 4);
			$table->date('approve_date');
			$table->double('period');
			$table->double('install_amount', 5,4);
			$table->double('total_pay', 10, 8)->nullable();
			$table->double('total_due', 10, 8)->nullable();
			$table->double('loan_no');
			$table->string('status', 200);
			$table->string('loan_detail', 300);
		});
	}

	public function down()
	{
		Schema::drop('loan');
	}
}