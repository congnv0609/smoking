<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('account_id');
            $table->string('account');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('nth_day_current')->default(0);
            $table->integer('ema_completed_nth_day')->default(0);
            $table->integer('incentive_nth_day')->default(0);
            $table->integer('incentive_total')->default(0);
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
        Schema::dropIfExists('surveys');
    }
}
