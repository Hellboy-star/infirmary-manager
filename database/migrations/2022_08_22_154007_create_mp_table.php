<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mp', function (Blueprint $table) {
            $table->id();
            $table->string("MATSA");
            $table->string("IT");
            $table->string("NOMSA");
            $table->string("PRESA");
            $table->string("POSTE");
            $table->integer("NBRSA");
            $table->string("SEXSA");
            $table->integer("AGE");
            $table->date("DATEMP");
            $table->integer("MPNUMTAB");
            $table->string("MPDESIGNATION");
            $table->string("MALCARAPRO");
            $table->string("AGENTPATH");
            $table->date("DATE1CNSS");
            $table->date("DATE2CNSS");
            $table->string("AVISCNSS");
            $table->string("TRAITEMENT");
            $table->string("OBSERVATION");

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
        Schema::dropIfExists('mp');
    }
}