<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('username',30)->unique(); 
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->enum('usuario_type',['Domain\\\\Cliente\\\\Cliente', 'Domain\\\\Administrador\\\\Administrador']);
            $table->integer('usuario_id')->unsigned();
            $table->date('data_nascimento')->nullable();
            $table->string('avatar');
            $table->rememberToken();
            $table->string('confirm_token',100);
            $table->tinyInteger('ativo')->default(0);
            $table->integer('qtd_lances')->unsigned()->default(20);
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
        Schema::dropIfExists('usuarios');
    }
}
