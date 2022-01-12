<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEma5Columns extends Migration
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
            $table->integer('d1_a')->change();
            $table->integer('d1_b')->change();
            $table->integer('d1_c')->change();

            $table->integer('p1_a')->change();
            $table->integer('p1_b')->change();
            $table->integer('p1_c')->change();
            $table->integer('p1_d')->change();

            $table->integer('p2_a')->change();
            $table->integer('p2_b')->change();
            $table->integer('p2_c')->change();
            $table->integer('p2_d')->change();

            $table->integer('c1_a')->change();
            $table->integer('c1_b')->change();
            $table->integer('c1_c')->change();
            $table->integer('c1_d')->change();
            $table->integer('c1_e')->change();
            $table->integer('c1_f')->change();
            $table->integer('c1_g')->change();
            $table->integer('c1_h')->change();
            $table->integer('c1_i')->change();

            $table->integer('c2_a')->change();
            $table->integer('c2_b')->change();
            $table->integer('c2_c')->change();
            $table->integer('c2_d')->change();
            $table->integer('c2_e')->change();
            $table->integer('c2_f')->change();
            $table->integer('c2_g')->change();
            $table->integer('c2_h')->change();
            $table->integer('c2_i')->change();
            $table->integer('c2_j')->change();
            $table->integer('c2_k')->change();
            $table->integer('c2_l')->change();
            $table->integer('c2_m')->change();
            $table->integer('c2_n')->change();
            $table->integer('c2_o')->change();
            $table->integer('c2_p')->change();
            $table->integer('c2_q')->change();

            $table->integer('c3_a')->change();
            $table->integer('c3_b')->change();
            $table->integer('c3_c')->change();
            $table->integer('c3_d')->change();
            $table->integer('c3_e')->change();
            $table->integer('c3_f')->change();

            $table->integer('b1_a')->change();
            $table->integer('b1_b')->change();
            $table->integer('b1_c')->change();
            $table->integer('b1_d')->change();
            $table->integer('b1_e')->change();
            $table->integer('b1_f')->change();
            $table->integer('b1_g')->change();
            $table->integer('b1_h')->change();
            $table->integer('b1_i')->change();
            $table->integer('b1_j')->change();

            $table->integer('b6_a')->change();
            $table->integer('b6_b')->change();
            $table->integer('b6_c')->change();

            $table->integer('b9_a')->change();
            $table->integer('b9_b')->change();
            $table->integer('b9_c')->change();

            $table->integer('b12_a')->change();
            $table->integer('b12_b')->change();
            $table->integer('b12_c')->change();
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
