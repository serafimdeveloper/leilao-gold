<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('forma_pagto_id')->unsigned();
            $table->foreign('forma_pagto_id')->references('id')->on('forma_pagtos')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->date('data');
            $table->time('hora');
            $table->string('codigo');
            $table->string('descricao');
            $table->integer('quantidade')->unsigned();
            $table->string('token');
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
    	Schema::table('compras', function(Blueprint $table){
    		$table->dropForeign(['forma_pagto_id']);
    		$table->dropForeign(['usuario_id']);
    	});
        Schema::dropIfExists('compras');
    }
}
