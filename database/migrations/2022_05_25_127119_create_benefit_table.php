<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBenefitTable extends Migration {

	public function up()
	{
		Schema::create('benefit', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('name', 200);
			$table->string('description',200);
		});
	}

	public function down()
	{
		Schema::drop('benefit');
	}
}