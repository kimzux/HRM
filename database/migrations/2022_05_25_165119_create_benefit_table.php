<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBenefitTable extends Migration {

	public function up()
	{
		Schema::create('benefit', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 200);
			$table->double('amount',10,2);
		});
	}

	public function down()
	{
		Schema::drop('benefit');
	}
}