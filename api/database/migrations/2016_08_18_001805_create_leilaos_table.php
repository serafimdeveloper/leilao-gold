<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeilaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leiloes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_leilao_id')->unsigned();
            $table->foreign('tipo_leilao_id')->references('id')->on('tipo_leiloes')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('itens')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('set null');
            $table->integer('vendedor_id')->unsigned();
            $table->foreign('vendedor_id')->references('id')->on('vendedores')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('data_inicio');
            $table->dateTime('data_final')->nullable();
            $table->timestamp('hora_inicio')->nullable();
            $table->timestamp('hora_final')->nullable();            
            $table->integer('quant_lances')->unsigned()->default(0);
            $table->double('valor',10,2)->unsigned()->default(0.00);            
            $table->enum('status',['andamento','fechado','pendente'])->default('pendente');
            $table->enum('frete',['sim','nao'])->default('nao');
            $table->string('cep_correio',10)->nullable();
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
    	Schema::table('leiloes', function(Blueprint $table){
    		$table->dropForeign(['tipo_leilao_id']);
    		$table->dropForeign(['item_id']);
    		$table->dropForeign(['vendedor_id']);
    		$table->dropForeign(['usuario_id']);
    	});
        Schema::dropIfExists('leiloes');
    }
}
