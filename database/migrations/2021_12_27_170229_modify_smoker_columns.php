<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySmokerColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('smokers', function (Blueprint $table) {
            $table->renameColumn('nth_day_current', 'prompt_ema');
            $table->renameColumn('ema_completed_nth_day', 'response_ema');
            $table->renameColumn('incentive_nth_day', 'non_response_ema');
            $table->renameColumn('incentive_total', 'future_ema');

            $table->after('incentive_total', function ($table) {
                $table->decimal('response_rate')->nullable();
            });
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('smokers', function (Blueprint $table) {
        //     $table->dropColumn('prompt_ema');
        //     $table->dropColumn('response_ema');
        //     $table->dropColumn('non_response_ema');
        //     $table->dropColumn('future_ema');
        //     $table->dropColumn('response_rate');
        // });
    }
}
