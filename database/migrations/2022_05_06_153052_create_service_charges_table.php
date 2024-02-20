<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("service_provider_id")->nullable();
            $table->unsignedBigInteger("service_id")->nullable();
            $table->decimal("charges")->default(0)->nullable();
            $table->string("charges_type")->nullable();
            $table->timestamps();
            $table->foreign("service_provider_id")->references("id")->on("service_providers");
            $table->foreign("service_id")->references("id")->on("services");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_charges');
    }
}
