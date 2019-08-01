<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id',true);
            $table->string('nom',80)->nullable(false);
            $table->string('prenom',80)->nullable(false);
            $table->integer('age')->nullable();
            $table->date('datenais')->nullable();
            $table->boolean('sexe');
            $table->string('cellulaire',20)->nullable();
            $table->string('prefession',20);
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
        Schema::dropIfExists('patient');
    }
}
