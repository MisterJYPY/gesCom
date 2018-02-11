<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRdvreportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdvreportes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');

            $table->string('contact');
            $table->string('adresse');

            $table->string('dateprevu');
            $table->string('datereport');
            $table->string('heure_debutprevu');
            $table->string('heure_finprevu');
            $table->string('heure_debutreport');
            $table->string('heure_finreport');
            $table->text('objet');
            $table->text('motif');
            $table->string('user');
            $table->unsignedInteger('rdv');
            $table->foreign('rdv')
                ->references('id')->on('rdvs')
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
        Schema::dropIfExists('rdvreportes');
    }
}
