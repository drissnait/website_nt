<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idEtu');
            $table->bigInteger('idManager')->nullable();
            $table->bigInteger('idEntreprise');
            $table->string('idType');
            $table->string('thematique')->nullable();
            $table->string('description')->nullable();
            $table->date('dateEntree')->nullable();
            $table->date('dateSortie')->nullable();
            $table->timestamps();

            $table->foreign('idEtu')->references('id')->on('etudiants')->onDelete('cascade');
            $table->foreign('idManager')->references('id')->on('managers');
            $table->foreign('idEntreprise')->references('id')->on('entreprises');
            $table->foreign('idType')->references('id')->on('type_missions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missions');
    }
}
