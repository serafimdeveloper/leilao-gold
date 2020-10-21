<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('tipo_contato',['email','celular','telefone','site']);
            $table->string('descricao');
            $table->string('nome_contato',200)->nullable();
            $table->text('observacao');
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
    	Schema::table('contatos', function(Blueprint $table){
    		$table->dropForeign(['usuario_id']);
    	});
        Schema::dropIfExists('contatos');
    }
}
