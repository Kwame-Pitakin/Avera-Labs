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
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();
            $table->string('lab_name')->unique();
            $table->string('lab_address');
            $table->decimal('latitude', 6,4)->nullable();
            $table->decimal('longitude', 7,4)->nullable();
            $table->string('lab_Ghanapost_gps')->nullable();
            $table->string('lab_email')->unique();
            $table->string('lab_phone')->unique();
            $table->integer('lab_rating');
            $table->longText('lab_description');
            $table->string('lab_images_path')->nullable();
            $table->json('all_tests')->nullable();
            $table->string('lab_logo_path')->nullable();
            $table->integer('lab_status');
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
        Schema::dropIfExists('laboratories');
    }
};
