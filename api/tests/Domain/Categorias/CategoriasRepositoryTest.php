<?php
/**
 * Created by PhpStorm.
 * User: Douglas Serafim
 * Date: 23/09/2016
 * Time: 14:12
 */

namespace Domain\Categorias\Categoria;


use App\Exceptions\RepositoryException;
use Domain\Categorias\Categoria;
use Domain\Categorias\CategoriasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App;


class CategoriasRepositoryTest extends \TestCase
{
    use DatabaseTransactions;

    public function test_store()
    {
        $repo = App::make(CategoriasRepository::class);
        $store = $repo->store(['nome'=>'categoria teste','descricao'=>'descricao da categoria teste']);
        $this->assertInstanceOf(Categoria::class, $store);
    }

    public function test_update()
    {
        $repo = App::make(CategoriasRepository::class);

        $categoria = Categoria::create(['nome'=>'categoria teste','descricao'=>'descricao da categoria teste']);

        $update = $repo->update(['nome' => 'categoria teste atualizada'], $categoria->id);

        $this->assertInstanceOf(Categoria::class, $update);
        $this->assertEquals($categoria->id, $update->id);
    }

    public function test_get()
    {
        $repo = App::make(CategoriasRepository::class);

        $categoria = Categoria::create(['nome'=>'categoria teste','descricao'=>'descricao da categoria teste']);

        $get = $repo->get($categoria->id);

        $this->assertInstanceOf(Categoria::class, $get);
        $this->assertEquals($get->id, $categoria->id);
    }

    public function test_delete()
    {
        $repo = App::make(CategoriasRepository::class);

        $categoria = Categoria::create(['nome'=>'categoria teste','descricao'=>'descricao da categoria teste']);

        $delete = $repo->delete($categoria->id);

        $this->assertEquals(1, $delete);

        $this->setExpectedExceptionRegExp(RepositoryException::class);
        $repo->withoutTrashed()->get($categoria->id);
    }

    public function test_force_delete()
    {
        $repo = App::make(CategoriasRepository::class);

        $categoria = Categoria::create(['nome'=>'categoria teste','descricao'=>'descricao da categoria teste']);

        $repo->forceDelete($categoria->id);

        $this->setExpectedExceptionRegExp(RepositoryException::class);
        $trashed = $repo->onlyTrashed()->get($categoria->id);
    }

}