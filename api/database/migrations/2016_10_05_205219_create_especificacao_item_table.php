<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecificacaoItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('especificacao_item', function(Blueprint $table) {
            $table->integer('especificacao_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->primary(['especificacao_id', 'item_id']);
            $table->foreign('item_id')->references('id')->on('itens')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('especificacao_id')->references('id')->on('especificacoes')->onUpdate('cascade')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('especificacao_item', function(Blueprint $table){
    		$table->dropForeign(['especificacao_id']);
    		$table->dropForeign(['item_id']);
    	});
        Schema::dropIfExists('especificacao_item');
    }
}
