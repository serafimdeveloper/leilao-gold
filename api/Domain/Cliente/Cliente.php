<?php
namespace Domain\Cliente;

use Domain\BaseModel;


class Cliente extends BaseModel
{
	protected $fillable=['data_assinatura','ip_assinatura','aceita'];
	protected $table = 'clientes';

	public function usuario()
	{
            return $this->morphOne(\Domain\Usuarios\Usuario::class,'usuario');
	}

}