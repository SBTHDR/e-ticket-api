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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('train_id');
            $table->foreignId('bogi_id')->constrained();
            $table->unsignedBigInteger('type')->default(0)->comment('0 = ac');
            $table->unsignedBigInteger('status')->default(0)->comment('0 = available, 1 = booked');
            $table->string('name');
            $table->timestamps();

            $table->foreign('train_id')->references('id')->on('trains');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
    }
};
