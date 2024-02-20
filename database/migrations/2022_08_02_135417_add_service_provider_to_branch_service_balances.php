

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServiceProviderToBranchServiceBalances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branch_service_balances', function (Blueprint $table) {
            $table->foreignId('service_provider_id')->nullable()->after('branch_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branch_service_balances', function (Blueprint $table) {
//            $table->dropForeign(['service_provider_id']);
            $table->dropColumn('service_provider_id');
        });
    }
}
