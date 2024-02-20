<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToServiceChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_charges', function (Blueprint $table) {
            //
            $table->boolean("require_remote_fetch")->default(false)->nullable();
            $table->string("check_url")->nullable();
            $table->string("initial_payment_url")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_charges', function (Blueprint $table) {
            //
            $table->dropColumn("require_remote_fetch");
            $table->dropColumn("check_url");
            $table->dropColumn("initial_payment_url");
        });
    }
}
