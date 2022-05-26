<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('train_id')->constrained();
            $table->foreignId('station_id')->constrained();
            $table->time('time');
            $table->float('ac_a_price')->nullable();
            $table->float('ac_b_price')->nullable();
            $table->float('ac_c_price')->nullable();
            $table->float('ac_d_price')->nullable();
            $table->float('nac_a_price')->nullable();
            $table->float('nac_b_price')->nullable();
            $table->float('nac_c_price')->nullable();
            $table->float('nac_d_price')->nullable();
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
        Schema::dropIfExists('schedules');
    }
};
