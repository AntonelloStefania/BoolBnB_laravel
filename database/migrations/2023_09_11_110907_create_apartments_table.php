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
            $table->string('title', 50);
            $table->string('address');
            $table->string('lat');
            $table->string('lon');
            $table->text('cover');
            $table->double('price', 7,2);
            $table->boolean('visibility');
            $table->text('description');
            $table->tinyInteger('n_rooms');
            $table->tinyInteger('n_wc');
            $table->tinyInteger('mq');
            $table->unsignedBigInteger('user_id');
            $table->string('slug');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
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
