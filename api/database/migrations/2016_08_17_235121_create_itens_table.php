<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('item_type',['Domain\\\\Produtos\\\\Produto','Domain\\\\Servicos\\\\Servico']);
            $table->integer('item_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nome',100);
            $table->text('descricao');
            $table->double('valor',10,2);
            $table->integer('quantidade')->unsigned()->nullable();
            $table->timestamps();
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
    	Schema::table('itens', function(Blueprint $table){
    		$table->dropForeign(['usuario_id']);
    		$table->dropForeign(['categoria_id']);
    	});
        Schema::dropIfExists('itens');
    }
}
