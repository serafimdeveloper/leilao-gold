<?php

namespace Domain\FormaPagtos;

use Domain\BaseModel;

class FormaPagto extends BaseModel
{
    protected $table = 'forma_pagtos';
    protected $fillable = ['descricao'];
    
    public $timestamp = false;
    
    public function compras(){
        return $this->hasMany(\Domain\Compras\Compra::class,'forma_pagto_id');
    }
}
