<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBenefitTable extends Migration {

	public function up()
	{
		Schema::create('benefit', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->foreignId('employee_id')->constrained('employee');
			$table->double('total_benefit', 10,2);
			$table->string('name', 200);
			$table->double('amount',10,2);
		});
	}

	public function down()
	{
		Schema::drop('benefit');
	}
}