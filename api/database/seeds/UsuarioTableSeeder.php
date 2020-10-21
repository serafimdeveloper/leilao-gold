<?php

use Domain\Administrador\Administrador;
use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador = factory(Administrador::class);
    }
}
