<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecificaosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('especificacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nome', 30);
            $table->string('descricao')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
    	Schema::table('especificacoes', function(Blueprint $table){
    		$table->dropForeign(['categoria_id']);
    	});
        Schema::dropIfExists('especificacoes');
    }

}
