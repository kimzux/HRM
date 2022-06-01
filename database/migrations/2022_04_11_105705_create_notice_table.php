<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNoticeTable extends Migration {

	public function up()
	{
		Schema::create('notice', function(Blueprint $table) {
			$table->increments('id');
			$table->date('date');
			$table->string('title', 300);
			$table->string('file_url', 300);
		
		});
	}

	public function down()
	{
		Schema::drop('notice');
	}
}