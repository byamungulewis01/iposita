<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string("telephone")->nullable();
            $table->boolean("is_super_admin")->default(false);
            $table->boolean("is_active")->default(true);
            $table->unsignedBigInteger("branch_id")->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign("users_branch_id_foreign");
            $table->dropColumn("telephone");
            $table->dropColumn("is_active");
            $table->dropColumn("is_super_admin");
            $table->dropColumn("branch_id");
        });
    }
}
