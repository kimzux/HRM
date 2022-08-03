<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeductionPayslipTable extends Migration {

	public function up()
	{
		Schema::create('deduction_payslip', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->foreignId('payslip_id')->constrained('payslip');
			$table->double('amount', 15,2);
			$table->string('deduction_name', 500);
			
		});
	}

	public function down()
	{
		Schema::drop('deduction_payslip');
	}
}