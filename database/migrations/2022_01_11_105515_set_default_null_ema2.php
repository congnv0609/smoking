<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetDefaultNullEma2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ema2s', function (Blueprint $table) {

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

            $table->integer('b2_c1a')->nullable()->default(NULL)->change();
            $table->integer('b2_c1b')->nullable()->default(NULL)->change();
            $table->integer('b2_c1c')->nullable()->default(NULL)->change();
            $table->integer('b2_c1d')->nullable()->default(NULL)->change();
            $table->integer('b2_c1e')->nullable()->default(NULL)->change();
            $table->integer('b2_c1f')->nullable()->default(NULL)->change();
            $table->integer('b2_c1g')->nullable()->default(NULL)->change();
            $table->integer('b2_c1h')->nullable()->default(NULL)->change();

            $table->integer('b2_c2a')->nullable()->default(NULL)->change();
            $table->integer('b2_c2b')->nullable()->default(NULL)->change();
            $table->integer('b2_c2c')->nullable()->default(NULL)->change();
            $table->integer('b2_c2d')->nullable()->default(NULL)->change();
            $table->integer('b2_c2e')->nullable()->default(NULL)->change();
            $table->integer('b2_c2f')->nullable()->default(NULL)->change();
            $table->integer('b2_c2g')->nullable()->default(NULL)->change();
            $table->integer('b2_c2h')->nullable()->default(NULL)->change();
            $table->integer('b2_c2i')->nullable()->default(NULL)->change();
            $table->integer('b2_c2j')->nullable()->default(NULL)->change();
            $table->integer('b2_c2k')->nullable()->default(NULL)->change();
            $table->integer('b2_c2l')->nullable()->default(NULL)->change();
            $table->integer('b2_c2m')->nullable()->default(NULL)->change();
            $table->integer('b2_c2n')->nullable()->default(NULL)->change();
            $table->integer('b2_c2o')->nullable()->default(NULL)->change();
            $table->integer('b2_c2p')->nullable()->default(NULL)->change();

            $table->integer('b2_c3a')->nullable()->default(NULL)->change();
            $table->integer('b2_c3b')->nullable()->default(NULL)->change();
            $table->integer('b2_c3c')->nullable()->default(NULL)->change();
            $table->integer('b2_c3d')->nullable()->default(NULL)->change();
            $table->integer('b2_c3e')->nullable()->default(NULL)->change();

            $table->integer('b3_c1a')->nullable()->default(NULL)->change();
            $table->integer('b3_c1b')->nullable()->default(NULL)->change();
            $table->integer('b3_c1c')->nullable()->default(NULL)->change();
            $table->integer('b3_c1d')->nullable()->default(NULL)->change();
            $table->integer('b3_c1e')->nullable()->default(NULL)->change();
            $table->integer('b3_c1f')->nullable()->default(NULL)->change();
            $table->integer('b3_c1g')->nullable()->default(NULL)->change();
            $table->integer('b3_c1h')->nullable()->default(NULL)->change();

            $table->integer('b3_c2a')->nullable()->default(NULL)->change();
            $table->integer('b3_c2b')->nullable()->default(NULL)->change();
            $table->integer('b3_c2c')->nullable()->default(NULL)->change();
            $table->integer('b3_c2d')->nullable()->default(NULL)->change();
            $table->integer('b3_c2e')->nullable()->default(NULL)->change();
            $table->integer('b3_c2f')->nullable()->default(NULL)->change();
            $table->integer('b3_c2g')->nullable()->default(NULL)->change();
            $table->integer('b3_c2h')->nullable()->default(NULL)->change();
            $table->integer('b3_c2i')->nullable()->default(NULL)->change();
            $table->integer('b3_c2j')->nullable()->default(NULL)->change();
            $table->integer('b3_c2k')->nullable()->default(NULL)->change();
            $table->integer('b3_c2l')->nullable()->default(NULL)->change();
            $table->integer('b3_c2m')->nullable()->default(NULL)->change();
            $table->integer('b3_c2n')->nullable()->default(NULL)->change();
            $table->integer('b3_c2o')->nullable()->default(NULL)->change();
            $table->integer('b3_c2p')->nullable()->default(NULL)->change();

            $table->integer('b3_c3a')->nullable()->default(NULL)->change();
            $table->integer('b3_c3b')->nullable()->default(NULL)->change();
            $table->integer('b3_c3c')->nullable()->default(NULL)->change();
            $table->integer('b3_c3d')->nullable()->default(NULL)->change();
            $table->integer('b3_c3e')->nullable()->default(NULL)->change();

            $table->integer('b4_c1a')->nullable()->default(NULL)->change();
            $table->integer('b4_c1b')->nullable()->default(NULL)->change();
            $table->integer('b4_c1c')->nullable()->default(NULL)->change();
            $table->integer('b4_c1d')->nullable()->default(NULL)->change();
            $table->integer('b4_c1e')->nullable()->default(NULL)->change();
            $table->integer('b4_c1f')->nullable()->default(NULL)->change();
            $table->integer('b4_c1g')->nullable()->default(NULL)->change();
            $table->integer('b4_c1h')->nullable()->default(NULL)->change();

            $table->integer('b4_c2a')->nullable()->default(NULL)->change();
            $table->integer('b4_c2b')->nullable()->default(NULL)->change();
            $table->integer('b4_c2c')->nullable()->default(NULL)->change();
            $table->integer('b4_c2d')->nullable()->default(NULL)->change();
            $table->integer('b4_c2e')->nullable()->default(NULL)->change();
            $table->integer('b4_c2f')->nullable()->default(NULL)->change();
            $table->integer('b4_c2g')->nullable()->default(NULL)->change();
            $table->integer('b4_c2h')->nullable()->default(NULL)->change();
            $table->integer('b4_c2i')->nullable()->default(NULL)->change();
            $table->integer('b4_c2j')->nullable()->default(NULL)->change();
            $table->integer('b4_c2k')->nullable()->default(NULL)->change();
            $table->integer('b4_c2l')->nullable()->default(NULL)->change();
            $table->integer('b4_c2m')->nullable()->default(NULL)->change();
            $table->integer('b4_c2n')->nullable()->default(NULL)->change();
            $table->integer('b4_c2o')->nullable()->default(NULL)->change();
            $table->integer('b4_c2p')->nullable()->default(NULL)->change();

            $table->integer('b4_c3a')->nullable()->default(NULL)->change();
            $table->integer('b4_c3b')->nullable()->default(NULL)->change();
            $table->integer('b4_c3c')->nullable()->default(NULL)->change();
            $table->integer('b4_c3d')->nullable()->default(NULL)->change();
            $table->integer('b4_c3e')->nullable()->default(NULL)->change();

            $table->integer('b5')->nullable()->default(NULL)->change();

            $table->integer('b6_a')->nullable()->default(NULL)->change();
            $table->integer('b6_b')->nullable()->default(NULL)->change();
            $table->integer('b6_c')->nullable()->default(NULL)->change();

            $table->integer('b7_c1a')->nullable()->default(NULL)->change();
            $table->integer('b7_c1b')->nullable()->default(NULL)->change();
            $table->integer('b7_c1c')->nullable()->default(NULL)->change();
            $table->integer('b7_c1d')->nullable()->default(NULL)->change();
            $table->integer('b7_c1e')->nullable()->default(NULL)->change();
            $table->integer('b7_c1f')->nullable()->default(NULL)->change();
            $table->integer('b7_c1g')->nullable()->default(NULL)->change();
            $table->integer('b7_c1h')->nullable()->default(NULL)->change();

            $table->integer('b7_c2a')->nullable()->default(NULL)->change();
            $table->integer('b7_c2b')->nullable()->default(NULL)->change();
            $table->integer('b7_c2c')->nullable()->default(NULL)->change();
            $table->integer('b7_c2d')->nullable()->default(NULL)->change();
            $table->integer('b7_c2e')->nullable()->default(NULL)->change();
            $table->integer('b7_c2f')->nullable()->default(NULL)->change();
            $table->integer('b7_c2g')->nullable()->default(NULL)->change();
            $table->integer('b7_c2h')->nullable()->default(NULL)->change();
            $table->integer('b7_c2i')->nullable()->default(NULL)->change();
            $table->integer('b7_c2j')->nullable()->default(NULL)->change();
            $table->integer('b7_c2k')->nullable()->default(NULL)->change();
            $table->integer('b7_c2l')->nullable()->default(NULL)->change();
            $table->integer('b7_c2m')->nullable()->default(NULL)->change();
            $table->integer('b7_c2n')->nullable()->default(NULL)->change();
            $table->integer('b7_c2o')->nullable()->default(NULL)->change();
            $table->integer('b7_c2p')->nullable()->default(NULL)->change();

            $table->integer('b7_c3a')->nullable()->default(NULL)->change();
            $table->integer('b7_c3b')->nullable()->default(NULL)->change();
            $table->integer('b7_c3c')->nullable()->default(NULL)->change();
            $table->integer('b7_c3d')->nullable()->default(NULL)->change();
            $table->integer('b7_c3e')->nullable()->default(NULL)->change();

            $table->integer('b8')->nullable()->default(NULL)->change();

            $table->integer('b9_a')->nullable()->default(NULL)->change();
            $table->integer('b9_b')->nullable()->default(NULL)->change();
            $table->integer('b9_c')->nullable()->default(NULL)->change();

            $table->integer('b10_c1a')->nullable()->default(NULL)->change();
            $table->integer('b10_c1b')->nullable()->default(NULL)->change();
            $table->integer('b10_c1c')->nullable()->default(NULL)->change();
            $table->integer('b10_c1d')->nullable()->default(NULL)->change();
            $table->integer('b10_c1e')->nullable()->default(NULL)->change();
            $table->integer('b10_c1f')->nullable()->default(NULL)->change();
            $table->integer('b10_c1g')->nullable()->default(NULL)->change();
            $table->integer('b10_c1h')->nullable()->default(NULL)->change();

            $table->integer('b10_c2a')->nullable()->default(NULL)->change();
            $table->integer('b10_c2b')->nullable()->default(NULL)->change();
            $table->integer('b10_c2c')->nullable()->default(NULL)->change();
            $table->integer('b10_c2d')->nullable()->default(NULL)->change();
            $table->integer('b10_c2e')->nullable()->default(NULL)->change();
            $table->integer('b10_c2f')->nullable()->default(NULL)->change();
            $table->integer('b10_c2g')->nullable()->default(NULL)->change();
            $table->integer('b10_c2h')->nullable()->default(NULL)->change();
            $table->integer('b10_c2i')->nullable()->default(NULL)->change();
            $table->integer('b10_c2j')->nullable()->default(NULL)->change();
            $table->integer('b10_c2k')->nullable()->default(NULL)->change();
            $table->integer('b10_c2l')->nullable()->default(NULL)->change();
            $table->integer('b10_c2m')->nullable()->default(NULL)->change();
            $table->integer('b10_c2n')->nullable()->default(NULL)->change();
            $table->integer('b10_c2o')->nullable()->default(NULL)->change();
            $table->integer('b10_c2p')->nullable()->default(NULL)->change();

            $table->integer('b10_c3a')->nullable()->default(NULL)->change();
            $table->integer('b10_c3b')->nullable()->default(NULL)->change();
            $table->integer('b10_c3c')->nullable()->default(NULL)->change();
            $table->integer('b10_c3d')->nullable()->default(NULL)->change();
            $table->integer('b10_c3e')->nullable()->default(NULL)->change();

            $table->integer('b11')->nullable()->default(NULL)->change();

            $table->integer('b12_a')->nullable()->default(NULL)->change();
            $table->integer('b12_b')->nullable()->default(NULL)->change();
            $table->integer('b12_c')->nullable()->default(NULL)->change();

            $table->integer('b13_c1a')->nullable()->default(NULL)->change();
            $table->integer('b13_c1b')->nullable()->default(NULL)->change();
            $table->integer('b13_c1c')->nullable()->default(NULL)->change();
            $table->integer('b13_c1d')->nullable()->default(NULL)->change();
            $table->integer('b13_c1e')->nullable()->default(NULL)->change();
            $table->integer('b13_c1f')->nullable()->default(NULL)->change();
            $table->integer('b13_c1g')->nullable()->default(NULL)->change();
            $table->integer('b13_c1h')->nullable()->default(NULL)->change();

            $table->integer('b13_c2a')->nullable()->default(NULL)->change();
            $table->integer('b13_c2b')->nullable()->default(NULL)->change();
            $table->integer('b13_c2c')->nullable()->default(NULL)->change();
            $table->integer('b13_c2d')->nullable()->default(NULL)->change();
            $table->integer('b13_c2e')->nullable()->default(NULL)->change();
            $table->integer('b13_c2f')->nullable()->default(NULL)->change();
            $table->integer('b13_c2g')->nullable()->default(NULL)->change();
            $table->integer('b13_c2h')->nullable()->default(NULL)->change();
            $table->integer('b13_c2i')->nullable()->default(NULL)->change();
            $table->integer('b13_c2j')->nullable()->default(NULL)->change();
            $table->integer('b13_c2k')->nullable()->default(NULL)->change();
            $table->integer('b13_c2l')->nullable()->default(NULL)->change();
            $table->integer('b13_c2m')->nullable()->default(NULL)->change();
            $table->integer('b13_c2n')->nullable()->default(NULL)->change();
            $table->integer('b13_c2o')->nullable()->default(NULL)->change();
            $table->integer('b13_c2p')->nullable()->default(NULL)->change();

            $table->integer('b13_c3a')->nullable()->default(NULL)->change();
            $table->integer('b13_c3b')->nullable()->default(NULL)->change();
            $table->integer('b13_c3c')->nullable()->default(NULL)->change();
            $table->integer('b13_c3d')->nullable()->default(NULL)->change();
            $table->integer('b13_c3e')->nullable()->default(NULL)->change();

            $table->integer('b14_c1a')->nullable()->default(NULL)->change();
            $table->integer('b14_c1b')->nullable()->default(NULL)->change();
            $table->integer('b14_c1c')->nullable()->default(NULL)->change();
            $table->integer('b14_c1d')->nullable()->default(NULL)->change();
            $table->integer('b14_c1e')->nullable()->default(NULL)->change();
            $table->integer('b14_c1f')->nullable()->default(NULL)->change();
            $table->integer('b14_c1g')->nullable()->default(NULL)->change();
            $table->integer('b14_c1h')->nullable()->default(NULL)->change();

            $table->integer('b14_c2a')->nullable()->default(NULL)->change();
            $table->integer('b14_c2b')->nullable()->default(NULL)->change();
            $table->integer('b14_c2c')->nullable()->default(NULL)->change();
            $table->integer('b14_c2d')->nullable()->default(NULL)->change();
            $table->integer('b14_c2e')->nullable()->default(NULL)->change();
            $table->integer('b14_c2f')->nullable()->default(NULL)->change();
            $table->integer('b14_c2g')->nullable()->default(NULL)->change();
            $table->integer('b14_c2h')->nullable()->default(NULL)->change();
            $table->integer('b14_c2i')->nullable()->default(NULL)->change();
            $table->integer('b14_c2j')->nullable()->default(NULL)->change();
            $table->integer('b14_c2k')->nullable()->default(NULL)->change();
            $table->integer('b14_c2l')->nullable()->default(NULL)->change();
            $table->integer('b14_c2m')->nullable()->default(NULL)->change();
            $table->integer('b14_c2n')->nullable()->default(NULL)->change();
            $table->integer('b14_c2o')->nullable()->default(NULL)->change();
            $table->integer('b14_c2p')->nullable()->default(NULL)->change();

            $table->integer('b14_c3a')->nullable()->default(NULL)->change();
            $table->integer('b14_c3b')->nullable()->default(NULL)->change();
            $table->integer('b14_c3c')->nullable()->default(NULL)->change();
            $table->integer('b14_c3d')->nullable()->default(NULL)->change();
            $table->integer('b14_c3e')->nullable()->default(NULL)->change();

            $table->integer('b15_c1a')->nullable()->default(NULL)->change();
            $table->integer('b15_c1b')->nullable()->default(NULL)->change();
            $table->integer('b15_c1c')->nullable()->default(NULL)->change();
            $table->integer('b15_c1d')->nullable()->default(NULL)->change();
            $table->integer('b15_c1e')->nullable()->default(NULL)->change();
            $table->integer('b15_c1f')->nullable()->default(NULL)->change();
            $table->integer('b15_c1g')->nullable()->default(NULL)->change();
            $table->integer('b15_c1h')->nullable()->default(NULL)->change();

            $table->integer('b15_c2a')->nullable()->default(NULL)->change();
            $table->integer('b15_c2b')->nullable()->default(NULL)->change();
            $table->integer('b15_c2c')->nullable()->default(NULL)->change();
            $table->integer('b15_c2d')->nullable()->default(NULL)->change();
            $table->integer('b15_c2e')->nullable()->default(NULL)->change();
            $table->integer('b15_c2f')->nullable()->default(NULL)->change();
            $table->integer('b15_c2g')->nullable()->default(NULL)->change();
            $table->integer('b15_c2h')->nullable()->default(NULL)->change();
            $table->integer('b15_c2i')->nullable()->default(NULL)->change();
            $table->integer('b15_c2j')->nullable()->default(NULL)->change();
            $table->integer('b15_c2k')->nullable()->default(NULL)->change();
            $table->integer('b15_c2l')->nullable()->default(NULL)->change();
            $table->integer('b15_c2m')->nullable()->default(NULL)->change();
            $table->integer('b15_c2n')->nullable()->default(NULL)->change();
            $table->integer('b15_c2o')->nullable()->default(NULL)->change();
            $table->integer('b15_c2p')->nullable()->default(NULL)->change();

            $table->integer('b15_c3a')->nullable()->default(NULL)->change();
            $table->integer('b15_c3b')->nullable()->default(NULL)->change();
            $table->integer('b15_c3c')->nullable()->default(NULL)->change();
            $table->integer('b15_c3d')->nullable()->default(NULL)->change();
            $table->integer('b15_c3e')->nullable()->default(NULL)->change();

            $table->integer('b16_c1a')->nullable()->default(NULL)->change();
            $table->integer('b16_c1b')->nullable()->default(NULL)->change();
            $table->integer('b16_c1c')->nullable()->default(NULL)->change();
            $table->integer('b16_c1d')->nullable()->default(NULL)->change();
            $table->integer('b16_c1e')->nullable()->default(NULL)->change();
            $table->integer('b16_c1f')->nullable()->default(NULL)->change();
            $table->integer('b16_c1g')->nullable()->default(NULL)->change();
            $table->integer('b16_c1h')->nullable()->default(NULL)->change();

            $table->integer('b16_c2a')->nullable()->default(NULL)->change();
            $table->integer('b16_c2b')->nullable()->default(NULL)->change();
            $table->integer('b16_c2c')->nullable()->default(NULL)->change();
            $table->integer('b16_c2d')->nullable()->default(NULL)->change();
            $table->integer('b16_c2e')->nullable()->default(NULL)->change();
            $table->integer('b16_c2f')->nullable()->default(NULL)->change();
            $table->integer('b16_c2g')->nullable()->default(NULL)->change();
            $table->integer('b16_c2h')->nullable()->default(NULL)->change();
            $table->integer('b16_c2i')->nullable()->default(NULL)->change();
            $table->integer('b16_c2j')->nullable()->default(NULL)->change();
            $table->integer('b16_c2k')->nullable()->default(NULL)->change();
            $table->integer('b16_c2l')->nullable()->default(NULL)->change();
            $table->integer('b16_c2m')->nullable()->default(NULL)->change();
            $table->integer('b16_c2n')->nullable()->default(NULL)->change();
            $table->integer('b16_c2o')->nullable()->default(NULL)->change();
            $table->integer('b16_c2p')->nullable()->default(NULL)->change();

            $table->integer('b16_c3a')->nullable()->default(NULL)->change();
            $table->integer('b16_c3b')->nullable()->default(NULL)->change();
            $table->integer('b16_c3c')->nullable()->default(NULL)->change();
            $table->integer('b16_c3d')->nullable()->default(NULL)->change();
            $table->integer('b16_c3e')->nullable()->default(NULL)->change();
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
