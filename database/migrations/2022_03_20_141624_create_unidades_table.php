<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        //Criando tabela unidades
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();

            $table->string('unidade', 5);
            $table->string('descricao', 30);

            $table->timestamps();
        });

        //add fk da unidade na tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            //Criando coluna unidade_id
            $table->unsignedBigInteger('unidade_id');
            
            //Aplicando fk na coluna unidade_id
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
        
        //add fk da unidade na tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            //Criando coluna unidade_id
            $table->unsignedBigInteger('unidade_id');
            
            //Aplicando fk na coluna unidade_id
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            //Removendo fk
            $table->dropForeign('produtos_unidade_id_foreign'); //tabela_coluna_foreign
            
            //Removendo coluna unidade_id
            $table->dropColumn('unidade_id');
        });
        
        Schema::table('produto_detalhes', function (Blueprint $table) {
            //Removendo fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            
            //Removendo coluna unidade_id
            $table->dropColumn('unidade_id');
        });
        Schema::dropIfExists('unidades');
    }
};
