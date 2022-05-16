<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectTable extends Migration {

	public function up()
	{
		Schema::create('project', function(Blueprint $table) {
			$table->increments('id');
			$table->string('project_title', 100);
			$table->date('project_startdate');
			$table->date('project_enddate');
			$table->string('details', 500);
			$table->string('project_summary', 100);
			$table->string('project_status', 100);

		});
	}

	public function down()
	{
		Schema::drop('project');
	}
}