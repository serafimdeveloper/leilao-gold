<?php
namespace Domain\Administrador;

use App;
use App\Exceptions\RepositoryException;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Pagination\LengthAwarePaginator;

class AdministradorRepositoryTest extends \TestCase
{
    use DatabaseTransactions,
        WithoutMiddleware;

    public function test_store()
    {
        $repo = App::make(AdministradoresRepository::class);
        $store = $repo->store(['funcao'=>'teste']);
        $this->assertInstanceOf(Administrador::class, $store);
        $this->assertInstanceOf(Carbon::class, $store->created_at);
    }

    public function test_update()
    {
        $repo = App::make(AdministradoresRepository::class);
        $administrador = factory(Administrador::class)->create();
        $update = $repo->update(['funcao' => 'teste atualizado'], $administrador->id);
        $this->assertInstanceOf(Administrador::class, $update);
        $this->assertEquals($administrador->id, $update->id);
    }

    public function test_get()
    {
        $repo = App::make(AdministradoresRepository::class);
        $administrador = factory(Administrador::class)->create();
        $get = $repo->get($administrador->id);
        $this->assertInstanceOf(Administrador::class, $get);
        $this->assertEquals($get->id, $administrador->id);
    }

    public function test_all()
    {
        $repo = App::make(AdministradoresRepository::class);
        factory(Administrador::class)->create();
        $all = $repo->all();
        $this->assertInstanceOf(LengthAwarePaginator::class, $all);
        $this->assertInstanceOf(Administrador::class, $all->first());
    }

    public function test_delete()
    {
        $repo = App::make(AdministradoresRepository::class);
        $administrador = factory(Administrador::class)->create();
        $delete = $repo->delete($administrador->id);
        $this->assertEquals(1, $delete);
    }

}