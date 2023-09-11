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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('n_rooms');
            $table->tinyInteger('n_wc');
            $table->tinyInteger('mq');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->unsignedBigInteger('map_id');
            $table->foreign('map_id')->references('id')->on('maps');
            $table->unsignedBigInteger('sponsor_id');
            $table->foreign('sponsor_id')->references('id')->on('sponsors');
            $table->timestamp('sponsor_start')->nullable();
            $table->timestamp('sponsor_end')->nullable();
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
        Schema::dropIfExists('apartments');
    }
};
