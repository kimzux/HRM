<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBenefitPayslipTable extends Migration {

	public function up()
	{
		Schema::create('benefit_payslip', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->foreignId('payslip_id')->constrained('payslip');
			$table->double('amount', 15,2);
			$table->string('benefit_name', 500);
		
			
		});
	}

	public function down()
	{
		Schema::drop('benefit_payslip');
	}
}