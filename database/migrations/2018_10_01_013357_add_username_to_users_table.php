<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsernameToUsersTable extends Migration
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
            $table->integer('id_tipo_documento')->unsigned();
            $table->integer('documento');
            $table->index(
                ['id_tipo_documento', 'documento'] , 'documento_unico'
            )->unique();

            $table->foreign('id_tipo_documento')->references('id')->on('tipo_documentos');
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
            $table->dropForeign('users_id_tipo_documento_foreign');
            $table->dropColumn('username');
            $table->dropIndex('documento_unico');
            $table->dropColumn('id_tipo_documento');
            $table->dropColumn('documento');
        });
    }
}
