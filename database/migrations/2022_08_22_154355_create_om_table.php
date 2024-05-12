<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('om', function (Blueprint $table) {
            $table->id();
            $table->string("MATSA");
            $table->string("NOMSA");
            $table->string("PRESA");
            $table->string("NOM");
            $table->int("TAILLE");
            $table->string("TYPE");
            $table->longblob("ORDONNANCE");
            $table->bigInteger("personnels_id");
            $table->foreign("personnels_id")->references('id')->on('personnels')->onDelete('cascade');
            $table->bigInteger("personfam_id");
            $table->foreign("personfam_id")->references('id')->on('personfam')->onDelete('cascade');
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
        Schema::dropIfExists('om');
    }
}