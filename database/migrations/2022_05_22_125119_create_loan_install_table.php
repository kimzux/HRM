<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoanInstallTable extends Migration {

	public function up()
	{
		Schema::create('loan_install', function(Blueprint $table) {
			$table->id();
			$table->foreignId('loan_id')->constrained('loan');
			$table->date('date');
			$table->string('receiver');
			$table->double('amount_pay' , 10,2);
			$table->double('install_number');
			$table->text('note');
		});
	}

	public function down()
	{
		Schema::drop('loan_install');
	}
}