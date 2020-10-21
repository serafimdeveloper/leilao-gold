<?php

namespace Domain\Produtos;

use Domain\BaseModel;
use Domain\Itens\Interfaces\ItemInterface;
use Domain\Itens\Traits\ItemTraits;

class Produto extends BaseModel implements ItemInterface
{
    protected $table='produtos';
    protected $fillable = ['peso','largura','altura','profundidade'];
    public $timestamps = false;
    
   use ItemTraits;
    
    
}
