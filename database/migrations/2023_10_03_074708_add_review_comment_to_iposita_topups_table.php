<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReviewCommentToIpositaTopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iposita_topups', function (Blueprint $table) {

            $table->unsignedBigInteger('submitted_by')->nullable()->after('status');
            $table->unsignedBigInteger('reviewed_by')->nullable()->after('submitted_by');
            $table->text('review_comment')->nullable()->after('reviewed_by');
            $table->text('reviewed_at')->nullable()->after('review_comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iposita_topups', function (Blueprint $table) {
            $table->dropColumn('submitted_by');
            $table->dropColumn('reviewed_by');
            $table->dropColumn('review_comment');
            $table->dropColumn('reviewed_at');
        });
    }
}
