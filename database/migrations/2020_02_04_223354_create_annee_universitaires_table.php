<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnneeUniversitairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annee_universitaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idEtu');
            $table->bigInteger('idPromotion');
            $table->bigInteger('idVoie');
            $table->bigInteger('idAnnee');
            $table->bigInteger('idResultat');
            $table->timestamps();

            $table->foreign('idEtu')->references('id')->on('etudiants')->onDelete('cascade');
            $table->foreign('idPromotion')->references('id')->on('promotions');
            $table->foreign('idVoie')->references('id')->on('voies');
            $table->foreign('idAnnee')->references('id')->on('annees');
            $table->foreign('idResultat')->references('id')->on('resultats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annee_universitaires');
    }
}
