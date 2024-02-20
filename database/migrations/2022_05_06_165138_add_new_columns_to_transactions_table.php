<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("branch_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("branch_id")->references("id")->on("branches");
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
            //
            $table->dropForeign("transactions_user_id_foreign");
            $table->dropForeign("transactions_branch_id_foreign");
            $table->dropColumn("user_id");
            $table->dropColumn("branch_id");
        });
    }
}
