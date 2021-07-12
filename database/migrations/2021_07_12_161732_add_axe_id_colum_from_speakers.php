<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAxeIdColumFromSpeakers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('speakers', function (Blueprint $table) {
                $table->unsignedInteger('axe_id')->nullable();
    
                $table->foreign('axe_id', 'axe_fk_383954')->references('id')->on('axes');
            });
        
    }

}
