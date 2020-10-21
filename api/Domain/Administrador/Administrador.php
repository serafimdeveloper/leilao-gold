<?php
/**
 * Created by PhpStorm.
 * User: DouglasSerafim
 * Date: 06/10/2016
 * Time: 14:15
 */

namespace Domain\Administrador;



use Domain\BaseModel;

class Administrador extends BaseModel
{
    protected $fillable = ['funcao'];
	protected $table = 'administradores';

	public function usuario()
	{
            return $this->morphOne(\Domain\Usuarios\Usuario::class,'usuario');
	}

}