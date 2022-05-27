<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetTable extends Migration {

	public function up()
	{
		Schema::create('asset', function(Blueprint $table) {
			$table->id();
			$table->string('category_type', 100);
			$table->string('category_name', 100);
		});
	}

	public function down()
	{
		Schema::drop('asset');
	}
}