<?php

namespace Domain\Enderecos;

use Domain\BaseModel;

class Endereco extends BaseModel {
    protected $table = 'enderecos';
    protected $fillable = ['usuario_id','endereco','numero','complemento','bairro','cidade','uf'];
    
    public function usuario(){
        return $this->belongsTo(\Domain\Usuarios\Usuario::class);
    }
}
