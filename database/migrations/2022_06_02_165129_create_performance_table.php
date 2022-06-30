
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerformanceTable extends Migration {

	public function up()
	{
		Schema::create('performance', function(Blueprint $table) {
			$table->id();
			$table->foreignId('employee_id')->constrained('employee');
			$table->timestamps();
			$table->string('goals', 200);
			$table->string('expectation',100);
			$table->date('start_date');
			$table->date('end_date');
			$table->double('timeline');
			$table->string('expected_delivery_time',200);


		});
	}

	public function down()
    {
        Schema::table('performance', function (Blueprint $table) {
            $table->dropColumn(['create_at', 'updated_at']);
        });
    }
}