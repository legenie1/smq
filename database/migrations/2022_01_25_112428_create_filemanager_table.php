<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilemanagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filemanager', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('ext', 4);
            $table->double('file_size', 8, 2);
            $table->unsignedBigInteger('user_id');
            $table->string('absolute_url');
            $table->json('extra')->nullable();
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
        Schema::dropIfExists('filemanager');
    }
}
