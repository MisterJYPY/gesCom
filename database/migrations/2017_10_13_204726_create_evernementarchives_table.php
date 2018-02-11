<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvernementarchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evernementarchives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objetevent');
            $table->string('objetarchive');
            $table->string('dateevent');
            $table->string('lieu');
            $table->string('heure');
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
        Schema::dropIfExists('evernementarchives');
    }
}
