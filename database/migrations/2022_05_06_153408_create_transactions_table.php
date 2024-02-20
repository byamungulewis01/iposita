<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("service_charge_id");
            $table->string("customer_name")->nullable();
            $table->string("customer_phone")->nullable();
            $table->string("reference_number")->nullable();
            $table->decimal("amount",18,0)->default(0)->nullable();
            $table->decimal("charges")->default(0)->nullable();
            $table->string("charges_type")->nullable();
            $table->string("status")->nullable();
            $table->string("token")->nullable();
            $table->timestamps();
            $table->foreign("service_charge_id")->references("id")->on("service_charges");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
