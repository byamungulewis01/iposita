<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("province_id")->nullable();
            $table->unsignedBigInteger("district_id")->nullable();
            $table->unsignedBigInteger("sector_id")->nullable();
            $table->string("telephone")->nullable();
            $table->string("email")->nullable();
            $table->string("status")->nullable();
            $table->timestamps();
            $table->foreign("province_id")->references("id")->on("provinces");
            $table->foreign("district_id")->references("id")->on("districts");
            $table->foreign("sector_id")->references("id")->on("sectors");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
