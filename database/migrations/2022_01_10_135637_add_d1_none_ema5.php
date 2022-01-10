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
            $table->integer('d1_d')->nullable();
            $table->integer('d1_none')->nullable();
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
                $table->dropColumn('d1_none');
            }
        );
    }
}
