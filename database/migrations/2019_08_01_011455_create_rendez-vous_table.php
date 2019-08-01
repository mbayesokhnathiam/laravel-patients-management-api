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
            $table->engine = 'InnoDB';
            $table->integer('id',true);
            $table->string('numrendezvous',20);
            $table->date('daterendezvous');
            $table->text('note');
            $table->integer('patient_id')->index('patient_id');
            $table->integer('secretaire_id')->index('secretaire_id');
            $table->foreign('patient_id')->references('id')->on('patient');
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
