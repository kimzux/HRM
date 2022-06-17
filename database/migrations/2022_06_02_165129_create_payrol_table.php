
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePayrolTable extends Migration {

	public function up()
	{
		Schema::create('payrol', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->foreignId('loan_id')->constrained('loan')->nullable;
			$table->foreignId('deduction_id')->constrained('deduction')->nullable;
			$table->foreignId('benefit_id')->constrained('benefit')->nullable;
			$table->timestamps();
			$table->string('month', 100);
			$table->double('basic_salary', 10, 2);
			$table->double('work_overtime', 10,2)->nullabale;
			$table->double('final_salary', 10, 2);
			$table->date('pay_date');
			$table->string('status',100);
			$table->string('pay_type',200);


		});
	}

	public function down()
    {
        Schema::table('payrol', function (Blueprint $table) {
            $table->dropColumn(['create_at', 'updated_at']);
        });
    }
}