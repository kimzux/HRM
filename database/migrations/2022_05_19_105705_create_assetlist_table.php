<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetlistTable extends Migration {

	public function up()
	{
		Schema::create('assetlist', function(Blueprint $table) {
			$table->id();
			$table->foreignId('asset_id')->constrained('asset');
			$table->string('asset_name', 100);
			$table->string('asset_brand', 100);
			$table->string('asset_model', 100);
			$table->string('asset_code', 100);
			$table->string('configuration', 200);
            $table->float('depr_interval')->nullable();
            $table->float('depr_rate')->nullable();
			$table->date('purchase_date');
			$table->double('price');
			$table->double('quantity');
            $table->double('remain_quantity');
		});
	}

	public function down()
	{
		Schema::drop('assetlist');
	}
}
