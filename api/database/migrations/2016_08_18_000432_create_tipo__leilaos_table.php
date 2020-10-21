<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoLeilaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_leiloes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',30);
            $table->enum('tipo',['tempo','surpresa']);
            $table->integer('valor')->unsigned();
            $table->text('descricao');            
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
        Schema::dropIfExists('tipo_leiloes');
    }
}
