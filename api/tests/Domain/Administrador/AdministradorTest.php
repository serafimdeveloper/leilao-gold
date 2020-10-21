<?php

namespace Domain\Administrador;

use Domain\Usuarios\Usuario;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \Domain\Administrador\Administrador;

class AdministradorTest extends \TestCase
{
    use DatabaseTransactions;

    public function test_create_administrador()
    {
        $administrador = factory(Administrador::class)->create();

        $this->assertInstanceOf(Administrador::class,$administrador);

        $this->seeInDatabase('administradores',[
            'funcao'=>$administrador->funcao
        ]);
    }

    public function test_create_administrador_com_valor()
    {
        $administrador = factory(Administrador::class)->create(['funcao'=>'auxiliar 2']);

        $this->assertInstanceOf(Administrador::class,$administrador);

        $this->seeInDatabase('administradores',[
            'funcao'=>'auxiliar 2'
        ]);
    }

    public function test_create_administrador_sem_usuario()
{
    $administrador = factory(Administrador::class)->create();

    $this->assertInstanceOf(Administrador::class, $administrador);
    $this->assertNull($administrador->usuario);
}

    public function test_create_administrador_com_usuario()
    {
        $administrador = factory(Administrador::class)->create();

        $usuario = factory(Usuario::class)->create([
            'usuario_id' => $administrador->id,
            'usuario_type' => 'Domain\Administrador\Administrador'
        ]);

        $this->assertInstanceOf(Administrador::class, $administrador);

        $this->assertInstanceOf(Usuario::class, $administrador->usuario);
    }

    public function test_login_administrador()
    {
        $this->visit('/admin/login')
            ->type('douglas@leilaogold.com.br','email')
            ->type('123456','password')
            ->press('Login')
            ;
    }
	
}
