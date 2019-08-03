<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRendezVousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numrendezvous',20);
            $table->date('daterendezvous');
            $table->text('note');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('secretaire_id');
           
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('secretaire_id')->references('id')->on('users');


            $table->softDeletes();
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
        Schema::dropIfExists('rendezvous');
    }
}
