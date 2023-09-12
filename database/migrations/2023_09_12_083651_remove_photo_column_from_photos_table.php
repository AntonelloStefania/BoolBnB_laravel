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
        Schema::table('photos', function (Blueprint $table) {
            $table->dropColumn('photo_2');
            $table->dropColumn('photo_3');
            $table->dropColumn('photo_4');
            $table->dropColumn('photo_5');
            $table->dropColumn('photo_6');
            $table->dropColumn('photo_7');
            $table->dropColumn('photo_8');
            $table->dropColumn('photo_9');
            $table->dropColumn('photo_10');
            $table->dropColumn('photo_11');
            $table->dropColumn('photo_12');
            $table->dropColumn('photo_13');
            $table->dropColumn('photo_14');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {
            //
        });
    }
};
