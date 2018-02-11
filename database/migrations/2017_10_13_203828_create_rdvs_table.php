<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdvs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nom');

            $table->string('contact');
            $table->string('adresse');

            $table->string('date');
             $table->string('heure_debut');
            $table->string('heure_fin');
             $table->text('objet');
             $table->double('nombre_report')->defaut(0);
            $table->unsignedInteger('user');
            $table->foreign('user')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('rdvs');
    }
}
