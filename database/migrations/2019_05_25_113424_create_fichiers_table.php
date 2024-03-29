<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('fichiers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('auteur')->nullable();
            $table->string('type')->nullable();
            $table->string('format')->nullable();
            $table->string('lien');
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
         Schema::dropIfExists('fichiers');
    }
}
