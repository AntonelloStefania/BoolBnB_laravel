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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->text('photo_1');
            $table->text('photo_2')->nullable();
            $table->text('photo_3')->nullable();
            $table->text('photo_4')->nullable();
            $table->text('photo_5')->nullable();
            $table->text('photo_6')->nullable();
            $table->text('photo_7')->nullable();
            $table->text('photo_8')->nullable();
            $table->text('photo_9')->nullable();
            $table->text('photo_10')->nullable();
            $table->text('photo_11')->nullable();
            $table->text('photo_12')->nullable();
            $table->text('photo_13')->nullable();
            $table->text('photo_14')->nullable();
            $table->text('photo_15')->nullable();
            $table->unsignedBigInteger('apartment_id');
            $table->foreign('apartment_id')->references('id')->on('apartments');
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
        Schema::dropIfExists('photos');
    }
};
