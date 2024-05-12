<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonfamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personfam', function (Blueprint $table) {
            $table->id();
            $table->string("MATFA");
            $table->string("SITFA");
            $table->string("NOMFA");
            $table->string("PREFA");
            $table->string("DNMFA");
            $table->string("CHAFA");
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
        Schema::dropIfExists('personfam');
    }
}