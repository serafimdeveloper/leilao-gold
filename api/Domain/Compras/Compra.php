<?php

namespace Domain\Compras;

use Domain\BaseModel;

class Compra extends BaseModel
{
    protected $table = 'compras';
    protected $fillable = ['formas_pagto_id','usuario_id','data','hora','codigo','descricao','valor','quantidade','token'];
     
    public function forma_pagto(){
        return $this->belongsTo(\Domain\FormaPagtos\FormaPagto::class);
    }
    
    public function usuario(){
        return $this->belongsTo(\Domain\Usuarios\Usuario::class);
    }
    
}
