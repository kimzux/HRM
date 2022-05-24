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
			$table->date('purchase_date');
			$table->double('price');
			$table->double('quantity');


		});
	}

	public function down()
	{
		Schema::drop('assetlist');
	}
}