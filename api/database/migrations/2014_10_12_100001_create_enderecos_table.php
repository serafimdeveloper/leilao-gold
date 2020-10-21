<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->string('endereco',200);
            $table->integer('numero');
            $table->string('complemento',30)->nullable();
            $table->string('bairro',50);
            $table->string('cidade',50);
            $table->char('uf',2);
            $table->string('cep',10);
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
    	Schema::table('enderecos', function(Blueprint $table){
    		$table->dropForeign(['usuario_id']);
    	});
        Schema::dropIfExists('enderecos');
    }
}
