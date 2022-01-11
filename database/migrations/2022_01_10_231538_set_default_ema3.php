<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetDefaultEma3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ema3s', function (Blueprint $table) {
            
            $table->integer('c1_a')->nullable()->change();
            $table->integer('c1_b')->nullable()->change();
            $table->integer('c1_c')->nullable()->change();
            $table->integer('c1_d')->nullable()->change();
            $table->integer('c1_e')->nullable()->change();
            $table->integer('c1_f')->nullable()->change();
            $table->integer('c1_g')->nullable()->change();
            $table->integer('c1_h')->nullable()->change();
            $table->integer('c1_i')->nullable()->change();

            $table->integer('c2_a')->nullable()->change();
            $table->integer('c2_b')->nullable()->change();
            $table->integer('c2_c')->nullable()->change();
            $table->integer('c2_d')->nullable()->change();
            $table->integer('c2_e')->nullable()->change();
            $table->integer('c2_f')->nullable()->change();
            $table->integer('c2_g')->nullable()->change();
            $table->integer('c2_h')->nullable()->change();
            $table->integer('c2_i')->nullable()->change();
            $table->integer('c2_j')->nullable()->change();
            $table->integer('c2_k')->nullable()->change();
            $table->integer('c2_l')->nullable()->change();
            $table->integer('c2_m')->nullable()->change();
            $table->integer('c2_n')->nullable()->change();
            $table->integer('c2_o')->nullable()->change();
            $table->integer('c2_p')->nullable()->change();
            $table->integer('c2_q')->nullable()->change();

            $table->integer('c3_a')->nullable()->change();
            $table->integer('c3_b')->nullable()->change();
            $table->integer('c3_c')->nullable()->change();
            $table->integer('c3_d')->nullable()->change();
            $table->integer('c3_e')->nullable()->change();
            $table->integer('c3_f')->nullable()->change();

            $table->integer('b1_a')->nullable()->change();
            $table->integer('b1_b')->nullable()->change();
            $table->integer('b1_c')->nullable()->change();
            $table->integer('b1_d')->nullable()->change();
            $table->integer('b1_e')->nullable()->change();
            $table->integer('b1_f')->nullable()->change();
            $table->integer('b1_g')->nullable()->change();
            $table->integer('b1_h')->nullable()->change();
            $table->integer('b1_i')->nullable()->change();
            $table->integer('b1_j')->nullable()->change();

            $table->integer('b6_a')->nullable()->change();
            $table->integer('b6_b')->nullable()->change();
            $table->integer('b6_c')->nullable()->change();

            $table->integer('b9_a')->nullable()->change();
            $table->integer('b9_b')->nullable()->change();
            $table->integer('b9_c')->nullable()->change();

            $table->integer('b12_a')->nullable()->change();
            $table->integer('b12_b')->nullable()->change();
            $table->integer('b12_c')->nullable()->change();

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
