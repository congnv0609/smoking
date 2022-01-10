<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddD1NoneEma5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ema5s', function (Blueprint $table) {
            $table->after('d1c_range', function ($table) {
                $table->integer('d1_d')->default(0);
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
        Schema::table(
            'ema5s',
            function (Blueprint $table) {
                $table->dropColumn('d1_d');
            }
        );
    }
}
