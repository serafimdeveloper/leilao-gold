<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('leilao_id')->unsigned();
            $table->foreign('leilao_id')->references('id')->on('leiloes')->onUpdate('cascade')->onDelete('cascade');
            $table->datetime('hora');
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
    	Schema::table('lances', function(Blueprint $table){
    		$table->dropForeign(['leilao_id']);
    		$table->dropForeign(['usuario_id']);
    	});
        Schema::dropIfExists('lances');
    }
}
