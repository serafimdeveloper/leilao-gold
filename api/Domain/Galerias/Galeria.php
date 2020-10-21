<?php

namespace Domain\Galerias;

use Domain\BaseModel;

class Galeria extends BaseModel
{
    protected $table='galerias';
    protected $fillable = ['item_id','imagem'];
    public $timestamp = false;
    
    public function produto_servico(){
        return $this->belongsTo(\Domain\Itens\Item::class);
    }
}
