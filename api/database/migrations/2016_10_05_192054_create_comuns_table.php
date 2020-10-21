<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comuns', function (Blueprint $table) {
            $table->integer('vendedor_id')->unsigned();
            $table->primary('vendedor_id');
            $table->foreign('vendedor_id')->references('id')->on('vendedores')->onUpdate('cascade')->onDelete('cascade'); 
            $table->enum('tipo_pessoa',['F','J'])->default('F');
            $table->string('cpf_cnpj',20);
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
    	Schema::table('comuns', function(Blueprint $table){
    		$table->dropForeign(['vendedor_id']);
    	});
        Schema::dropIfExists('comuns');
    }
}
