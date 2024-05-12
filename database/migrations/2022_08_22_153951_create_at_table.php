<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at', function (Blueprint $table) {
            $table->id();

            $table->string("MATSA");
            $table->string("IT");
            $table->string("NOMSA");
            $table->string("PRESA");
            $table->string("SEXSA");
            $table->integer("AGE");
            $table->date("DATECONS");
            $table->date("DATEACID");
            $table->string("LIEU");
            $table->string("CAUSE");
            $table->string("NATURELESI");
            $table->string("LOCALISLESI");
            $table->date("DATE1CNSS");
            $table->date("DATE2CNSS");
            $table->string("AVICNSS");
            $table->string("NBRARRET");
            $table->string("TRAITEMENT");
            $table->string("MESECORREC");
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
        Schema::dropIfExists('at');
    }
}