<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAssetlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assetlist', function (Blueprint $table) {
            $table->float('depr_interval')->nullable()->after('configuration');
            $table->float('depr_rate')->nullable()->after('depr_interval');
            $table->double('remain_quantity')->default(0)->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assetlist', function (Blueprint $table) {
            //
        });
    }
}
