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
        Schema::create('test_combos', function (Blueprint $table) {
            $table->id();
            $table->string('combo_name')->unique();
            $table->unsignedBigInteger('laboratory_id');
            $table->string('combo_tags');
            $table->decimal('combo_price');
            $table->integer('turn_around_time')->nullable();
            $table->string('combo_target_gender');
            $table->longText('combo_description');
            $table->integer('combo_status')->nullable();
            $table->integer('accurate_from');


            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');

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
        Schema::dropIfExists('test_combos');
    }
};
