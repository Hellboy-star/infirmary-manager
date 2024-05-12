<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();

            $table->string("FONTSA");
            $table->string("TBLIB");
            $table->string("RESSA");
            $table->string("DIRSA");
            $table->string("MATSA");
            $table->string("CATSA");
            $table->string("NOMSA");
            $table->string("PRESA");
            $table->string("LEMSA");
            $table->string("SECSA");
            $table->string("VILSA");
            $table->string("TELSA");
            $table->string("LIESA");
            $table->string("NATSA");
            $table->string("SITSA");
            $table->string("NBRSA");
            $table->string("CHASA");
            $table->string("SSOSA");
            $table->string("SEXSA");
            $table->string("ALLSA");
            $table->string("DNASA");
            $table->string("ANCSA");

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
        Schema::dropIfExists('personnels');
    }
}