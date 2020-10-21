<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacotes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plano_pacote_id')->unsigned();
            $table->foreign('plano_pacote_id')->references('id')->on('plano_pacotes')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nome',100);
            $table->text('descricao');
            $table->double('valor',10,2);
            $table->integer('qtd_lances');
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
    	Schema::table('pacotes', function(Blueprint $table){
    		$table->dropForeign(['plano_pacote_id']);
    	});
        Schema::dropIfExists('pacotes');
    }
}
