<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChercheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cherche', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nom');

            $table->string('prenom');

            $table->string('HDR');

            $table->string('PHD');

            $table->string('Grade');

            $table->string('Spécialité');
            
            $table->string('Statut');

            $table->string('type');

            $table->string('typeEnc');

            $table->string('email');

            $table->datetime('email_verified_at')->nullable();

            $table->string('password');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
