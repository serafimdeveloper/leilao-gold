<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapelPermissaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissao_papel', function (Blueprint $table) {
            $table->integer('permissao_id')->unsigned();
            $table->integer('papel_id')->unsigned();
            $table->primary(['permissao_id', 'papel_id']);
            $table->foreign('permissao_id')->references('id')->on('permissoes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('papel_id')->references('id')->on('papeis')->onUpdate('cascade')->onDelete('cascade');
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
    	Schema::table('permissao_papel', function(Blueprint $table){
    		$table->dropForeign(['permissao_id']);
    		$table->dropForeign(['papel_id']);
    	});
        Schema::dropIfExists('permissao_papel');
    }
}
