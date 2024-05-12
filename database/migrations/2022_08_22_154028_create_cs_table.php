<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cs', function (Blueprint $table) {
            $table->id();

            $table->string("MATSA");
            $table->string("IT");
            $table->string("NOMSA");
            $table->string("PRESA");
            $table->string("POSTE");
            $table->string("SEXSA");
            $table->integer("AGE");
            $table->integer("POIDS");
            $table->integer("TAILLE");
            $table->date("DATECS");
            $table->integer("T");
            $table->integer("POULS");
            $table->integer("TA");
            $table->string("PLAINTES");
            $table->string("EXAMCLI");
            $table->string("BILAN");
            $table->string("DIAGNOSTIC");
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
        Schema::dropIfExists('cs');
    }
}