<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpis', function (Blueprint $table) {
            $table->id();
            $table->string('trimestre')->nullable();
            $table->string('Processus_id')->nullable();
            $table->string('taux_realisation')->nullable();
            $table->string('chiffre')->nullable();
            $table->string('objectif')->nullable();
            $table->string('cumul1')->nullable();
            $table->string('police_renouvele')->nullable();
            $table->string('police_a_renouvele')->nullable();
            $table->string('taux_encais1')->nullable();
            $table->string('total_encais1')->nullable();
            $table->string('total_prime1')->nullable();
            $table->string('cumul3')->nullable();
            $table->string('taux_encais2')->nullable();
            $table->string('total_encais2')->nullable();
            $table->string('total_prime2')->nullable();
            $table->string('cumul4')->nullable();
            $table->string('valeur_cible')->nullable();
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
        Schema::dropIfExists('kpis');
    }
}
