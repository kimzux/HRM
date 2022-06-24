<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerdeimRetiresTable extends Migration {

	public function up()
	{
		Schema::create('perdeimretires', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->foreignId('perdeim_id')->constrained('perdeim');
			$table->double('amount_used', 15,2);
			$table->string('file_url', 500);
			$table->string('file_title', 200);
			$table->boolean('status')->nullable();
			
		});
	}

	public function down()
	{
		Schema::drop('perdeimretires');
	}
}