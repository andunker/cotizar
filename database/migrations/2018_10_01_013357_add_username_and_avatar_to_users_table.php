<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsernameAndAvatarToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->boolean('id_tipo_documento');
            $table->integer('documento');
            $table->index(
                ['id_tipo_documento', 'documento'] , 'documento_unico'
            )->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropIndex('documento_unico');
            $table->dropColumn('id_tipo_documento');
            $table->dropColumn('documento');
        });
    }
}
