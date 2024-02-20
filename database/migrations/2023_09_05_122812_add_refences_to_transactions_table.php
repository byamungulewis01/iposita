<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRefencesToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {

            $table->double('units')->nullable();
            $table->string('internal_transaction_id')->nullable();
            $table->string('external_transaction_id')->nullable();
            $table->string('residential_rate')->nullable();
            $table->double('units_rate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['units_rate','units','internal_transaction_id','external_transaction_id','residential_rate']);
        });
    }
}
