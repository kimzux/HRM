<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogisticTable extends Migration {

	public function up()
	{
		Schema::create('logistic', function(Blueprint $table) {
			$table->id();
			$table->string('logistic_name',100);
			$table->string('description',300);
			$table->date('entry_date', 200);
			$table->string('logistic_sup',100);
			$table->double('quantity');

		});
	}

	public function down()
	{
		Schema::drop('logistic');
	}
}