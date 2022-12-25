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
        Schema::create('laboratory_test', function (Blueprint $table) {
            $table->unsignedBigInteger('laboratory_id');
            $table->unsignedBigInteger('test_id');
            $table->integer('lab_test_status');
            $table->primary(['laboratory_id','test_id']);
            $table->integer('turn_around_time')->nullable();

            $table->decimal('test_price');


            $table->foreign('laboratory_id')->references('id')->on('laboratories');
            $table->foreign('test_id')->references('id')->on('tests');
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
        Schema::dropIfExists('laboratory_test');
    }
};
