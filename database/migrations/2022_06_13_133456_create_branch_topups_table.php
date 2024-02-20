<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_topups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained();
            $table->foreignId('service_provider_id')->constrained();
            $table->foreignId('service_id')->constrained();
            $table->double('previous_amount')->default(0);
            $table->double('topup_amount')->default(0);
            $table->double('current_amount')->default(0);
            $table->string('status')->default('pending');
            $table->longText('description')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_topups');
    }
}
