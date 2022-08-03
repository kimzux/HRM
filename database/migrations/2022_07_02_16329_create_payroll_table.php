
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePayrollTable extends Migration {

	public function up()
	{
		Schema::create('payroll', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('status',100);
			$table->string('month',200);


		});
	}

	public function down()
    {
        Schema::table('payroll', function (Blueprint $table) {
            $table->dropColumn(['create_at', 'updated_at']);
        });
    }
}