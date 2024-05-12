<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vms', function (Blueprint $table) {
            $table->id();

            $table->string("MATSA");
            $table->string("IT");
            $table->string("NOMSA");
            $table->string("PRESA");
            $table->string("POSTE");
            $table->string("SEXSA");
            $table->integer("AGE");
            $table->integer("TAILLE");
            $table->integer("POIDS");
            $table->date("DATEVMS");
            $table->string("TYPVISI");
            $table->string("PLAINTES");
            $table->integer("POULS");
            $table->integer("TA");
            $table->integer("PA");
            $table->integer("PTI");
            $table->integer("PTE");
            $table->integer("AVOD");
            $table->integer("AVOG");
            $table->string("EXAMCLI");
            $table->string("BILAN");
            $table->string("AVISP");
            $table->string("CONCLMED");
            $table->string("APTITUDE");
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
        Schema::dropIfExists('vms');
    }
}