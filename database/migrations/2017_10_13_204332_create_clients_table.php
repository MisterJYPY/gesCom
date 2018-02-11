<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {

            $table->increments('id');

            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('adresse');
            $table->string('contact');
            $table->string('groupe');
            $table->double('etoile');
            $table->string('code');

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
        Schema::dropIfExists('clients');
    }
}
