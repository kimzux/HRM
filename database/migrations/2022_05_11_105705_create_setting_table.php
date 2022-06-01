<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingTable extends Migration {

	public function up()
	{
		Schema::create('setting', function(Blueprint $table) {
			$table->id();
			$table->text('description');
			$table->string('email_system',100);
			$table->string('phone_number',100 );
			$table->string('link',100 );


		});
	}

	public function down()
	{
		Schema::drop('setting');
	}
}