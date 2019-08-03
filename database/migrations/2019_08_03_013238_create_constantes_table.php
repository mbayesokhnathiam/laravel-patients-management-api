<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('temperature')->nullable();
            $table->string('poids',5)->nullable();
            $table->string('pa',10)->nullable();
            $table->string('taille',20)->nullable();

            $table->unsignedBigInteger('consultation_id');

            $table->foreign('consultation_id')->references('id')->on('consultation');

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
        Schema::dropIfExists('constantes');
    }
}
