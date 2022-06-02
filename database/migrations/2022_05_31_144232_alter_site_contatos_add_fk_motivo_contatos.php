<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function (Blueprint $table) {

            /* No sqlite, Ao alterar uma tablea inserindo uma coluna Not Null precisamos atribuir um valor default diferente de NULL */

            if ('sqlite' === env('DB_CONNECTION')) {
                $table->integer('motivo_contatos_id')->unsigned()->default(0);
            } else {
                $table->unsignedBigInteger('motivo_contatos_id');
            }
        });
        DB::statement('update site_contatos SET motivo_contatos_id = motivo_contato');


        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');

            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            if ('sqlite' === env('DB_CONNECTION')) {
                $table->integer('motivo_contato')->unsigned()->default(0);
            } else {
                /* O sql lite tambem não suporta deletar fk */
                $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
                $table->unsignedBigInteger('motivo_contato');
            }
        });

        DB::statement('update site_contatos SET motivo_contato = motivo_contatos_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
};
