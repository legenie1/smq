<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paiements', function (Blueprint $table) {
            $table->foreign(['activite_id'], 'activite_fk_1001')->references(['id'])->on('activites');
            $table->foreign(['nom_id'], 'nomuser_fk_1001')->references(['id'])->on('membres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paiements', function (Blueprint $table) {
            $table->dropForeign('activite_fk_1001');
            $table->dropForeign('nomuser_fk_1001');
        });
    }
}
