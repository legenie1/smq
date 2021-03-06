<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->foreign(['role_id'], 'FK_role_user_roles')->references(['id'])->on('roles')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'FK_role_user_users')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign('FK_role_user_roles');
            $table->dropForeign('FK_role_user_users');
        });
    }
}
