<?php

namespace Domain\Servicos;

use Domain\BaseModel;
use Domain\Itens\Interfaces\ItemInterface;
use Domain\Itens\Traits\ItemTraits;

class Servico extends BaseModel implements ItemInterface
{
    protected $table='servicos';
    protected $fillable = ['carga_horaria','area_cobertura'];
    public $timestamps = false;
    
    use ItemTraits;
   
}
