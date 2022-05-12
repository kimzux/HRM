<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankInfoTable extends Migration {

	public function up()
	{
		Schema::create('bank_info', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->string('holder_name', 200);
			$table->string('bank_name', 200);
			$table->string('branch_name', 200);
			$table->string('account_number', 200);
			$table->string('account_type', 200);
		});
	}

	public function down()
	{
		Schema::drop('bank_info');
	}
}