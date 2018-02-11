<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReclamationachivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamationachives', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nom');

            $table->string('contact');
            $table->string('adresse');

            $table->string('date');
            $table->string('heure');
            $table->text('objet');
            $table->text('motif');
            $table->string('user');
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
        Schema::dropIfExists('reclamationachives');
    }
}
