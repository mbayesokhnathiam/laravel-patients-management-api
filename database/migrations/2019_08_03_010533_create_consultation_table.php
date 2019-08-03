<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dateconsultation');
            $table->string('numconsultation');
            $table->text('observation');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('medecin_id');

            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('medecin_id')->references('id')->on('users');
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
        Schema::dropIfExists('consultation');
    }
}
