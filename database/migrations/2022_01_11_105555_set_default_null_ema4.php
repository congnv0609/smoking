<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetDefaultNullEma4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ema4s', function (Blueprint $table) {

            $table->integer('c1_a')->nullable()->default(NULL)->change();
            $table->integer('c1_b')->nullable()->default(NULL)->change();
            $table->integer('c1_c')->nullable()->default(NULL)->change();
            $table->integer('c1_d')->nullable()->default(NULL)->change();
            $table->integer('c1_e')->nullable()->default(NULL)->change();
            $table->integer('c1_f')->nullable()->default(NULL)->change();
            $table->integer('c1_g')->nullable()->default(NULL)->change();
            $table->integer('c1_h')->nullable()->default(NULL)->change();
            $table->integer('c1_i')->nullable()->default(NULL)->change();

            $table->integer('c2_a')->nullable()->default(NULL)->change();
            $table->integer('c2_b')->nullable()->default(NULL)->change();
            $table->integer('c2_c')->nullable()->default(NULL)->change();
            $table->integer('c2_d')->nullable()->default(NULL)->change();
            $table->integer('c2_e')->nullable()->default(NULL)->change();
            $table->integer('c2_f')->nullable()->default(NULL)->change();
            $table->integer('c2_g')->nullable()->default(NULL)->change();
            $table->integer('c2_h')->nullable()->default(NULL)->change();
            $table->integer('c2_i')->nullable()->default(NULL)->change();
            $table->integer('c2_j')->nullable()->default(NULL)->change();
            $table->integer('c2_k')->nullable()->default(NULL)->change();
            $table->integer('c2_l')->nullable()->default(NULL)->change();
            $table->integer('c2_m')->nullable()->default(NULL)->change();
            $table->integer('c2_n')->nullable()->default(NULL)->change();
            $table->integer('c2_o')->nullable()->default(NULL)->change();
            $table->integer('c2_p')->nullable()->default(NULL)->change();
            $table->integer('c2_q')->nullable()->default(NULL)->change();

            $table->integer('c3_a')->nullable()->default(NULL)->change();
            $table->integer('c3_b')->nullable()->default(NULL)->change();
            $table->integer('c3_c')->nullable()->default(NULL)->change();
            $table->integer('c3_d')->nullable()->default(NULL)->change();
            $table->integer('c3_e')->nullable()->default(NULL)->change();
            $table->integer('c3_f')->nullable()->default(NULL)->change();

            $table->integer('b1_a')->nullable()->default(NULL)->change();
            $table->integer('b1_b')->nullable()->default(NULL)->change();
            $table->integer('b1_c')->nullable()->default(NULL)->change();
            $table->integer('b1_d')->nullable()->default(NULL)->change();
            $table->integer('b1_e')->nullable()->default(NULL)->change();
            $table->integer('b1_f')->nullable()->default(NULL)->change();
            $table->integer('b1_g')->nullable()->default(NULL)->change();
            $table->integer('b1_h')->nullable()->default(NULL)->change();
            $table->integer('b1_i')->nullable()->default(NULL)->change();
            $table->integer('b1_j')->nullable()->default(NULL)->change();

            $table->integer('b6_a')->nullable()->default(NULL)->change();
            $table->integer('b6_b')->nullable()->default(NULL)->change();
            $table->integer('b6_c')->nullable()->default(NULL)->change();

            $table->integer('b9_a')->nullable()->default(NULL)->change();
            $table->integer('b9_b')->nullable()->default(NULL)->change();
            $table->integer('b9_c')->nullable()->default(NULL)->change();

            $table->integer('b12_a')->nullable()->default(NULL)->change();
            $table->integer('b12_b')->nullable()->default(NULL)->change();
            $table->integer('b12_c')->nullable()->default(NULL)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
