<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvernementreportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evernementreportes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('objetevent');
            $table->string('objetreport');
            $table->string('dateevent');
            $table->string('datereport');
            $table->string('lieuevent');
            $table->string('heureevent');
            $table->string('heurereport');
            $table->string('user');

            $table->unsignedInteger('evernement');
            $table->foreign('evernement')
                ->references('id')->on('evernements')
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
        Schema::dropIfExists('evernementreportes');
    }
}
