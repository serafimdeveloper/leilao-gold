<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministradorPapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrador_papel', function (Blueprint $table) {
            $table->integer('administrador_id')->unsigned();
            $table->integer('papel_id')->unsigned();
            $table->primary('administrador_id','papel_id');
            $table->foreign('administrador_id')->references('id')->on('administradores')->onUpdate('cascade')->onDelete('cascade');
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
    	Schema::table('administrador_papel', function(Blueprint $table){
    		$table->dropForeign(['papel_id']);
    		$table->dropForeign(['administrador_id']);
    	});
        Schema::dropIfExists('administrador_papel');
    }
}
