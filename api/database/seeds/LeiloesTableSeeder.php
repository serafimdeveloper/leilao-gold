<?php

use Illuminate\Database\Seeder;
use Domain\Leiloes\Leilao;

class LeiloesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leiloes = factory(Leilao::class);
    }
}
