<?php
/**
 * Created by PhpStorm.
 * User: Douglas Serafim
 * Date: 23/09/2016
 * Time: 13:07
 */

namespace Domain\Categorias\Categoria;


use Domain\Categorias\Categoria;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoriaTest extends \TestCase
{
    use DatabaseTransactions;

    public function test_create_categorias(){
        Categoria::create(['nome'=>'categoria teste','descricao'=>'descricao da categoria teste']);
        $this->seeInDatabase('categorias',['nome'=>'categoria teste']);
    }

    public function test_create_categorias_denpendecy_category(){
        $categoria = Categoria::create(['nome'=>'categoria teste','descricao'=>'descricao da categoria teste']);
        Categoria::create(['nome'=>'categoria teste dependencia','descricao'=>'descricao da categoria teste dependencia','categoria_id' => $categoria->id ]);
        $this->seeInDatabase('categorias',['nome'=>'categoria teste dependencia']);
    }



}