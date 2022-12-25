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
        Schema::create('sample_testcombo', function (Blueprint $table) {
            $table->unsignedBigInteger('testcombo_id');
            $table->unsignedBigInteger('sample_id');

            $table->foreign('testcombo_id')->references('id')->on('test_combos');
            $table->foreign('sample_id')->references('id')->on('samples');
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
        Schema::dropIfExists('sample_testcombo');
    }
};
