<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
          	$table->increments('id');
            $table->double('peso',10,3)->nullable();
            $table->double('largura',10,2)->nullable();
            $table->double('altura',10,2)->nullable();
            $table->double('profundidade',10,2)->nullable();
            $table->string('cor',30)->nullable();
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
        Schema::dropIfExists('produtos');
    }
}
