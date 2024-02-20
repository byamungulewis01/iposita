<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChargeCustomerColumnToServiceChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_charges', function (Blueprint $table) {
            $table->boolean('charge_customer')->default(0)->after('charges_type')->comment('0: Provider, 1: Customer');
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
        });
    }
}
