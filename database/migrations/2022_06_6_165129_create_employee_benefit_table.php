<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeBenefitTable extends Migration {

	public function up()
	{
		Schema::create('employee_benefit', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->foreignId('employee_id')->constrained('employee');
            $table->foreignId('benefit_id')->constrained('benefit');  
			$table->double('amount', 15,2);
			$table->string('effective_date',200);
			
		});
	}

	public function down()
	{
		Schema::drop('employee_benefit');
	}
}