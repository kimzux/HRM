
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePayslipTable extends Migration {

	public function up()
	{
		Schema::create('payslip', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->foreignId('payroll_id')->constrained('payroll')->nullable;
	        $table->timestamps();
			$table->string('month', 100)->nullable();
			$table->double('salary', 10, 2);
			$table->double('allowance_amount', 10, 2);
			$table->double('deduction_amount', 10, 2);
			$table->double('net_pay', 10, 2);
			


		});
	}

	public function down()
    {
        Schema::table('payslip', function (Blueprint $table) {
            $table->dropColumn(['create_at', 'updated_at']);
        });
    }
}