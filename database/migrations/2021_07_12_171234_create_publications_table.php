<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fichier');
            $table->string('typedocument');
            $table->string('titre');
            $table->string('titredelivre');
            $table->string('journal');
            $table->integer('volume');
            $table->integer('numero');
            $table->string('page');
            $table->date('annee');
            $table->string('editeur');
            $table->string('chapitre');
            $table->string('itle');
            $table->string('issn');
            $table->string('doi');
            $table->string('url');
            $table->date('anneeuniverciteur');
            $table->date('anneesoutenance');
            $table->string('encadreur');
            $table->string('resume');
            $table->string('motcle');
            $table->string('idApp');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
