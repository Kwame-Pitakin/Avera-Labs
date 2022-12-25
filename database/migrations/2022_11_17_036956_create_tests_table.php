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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('test_name')->unique();
            $table->integer('accurate_from')->nullable();
            $table->unsignedBigInteger('test_category_id');
            $table->json('test_sample_id')->nullable();
            $table->integer('test_status');
            $table->string('target_gender');
            
            $table->foreign('test_category_id')->references('id')->on('test_categories')->onDelete('cascade');;
            // $table->foreign('test_sample_id')->references('id')->on('samples');
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
        Schema::dropIfExists('tests');
    }
};
