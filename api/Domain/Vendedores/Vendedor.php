<?php

namespace Domain\Vendedores;

use Domain\BaseModel;

class Vendedor extends BaseModel
{
    protected $table = 'vendedores';
    protected $fillable = ['usuario_id','reputacao'];
    
    public function usuario(){
        return $this->belongsTo(\Domain\Usuarios\Usuario::class,'usuario_id');
    }
    
    public function leiloes(){
        return $this->hasMany(\Domain\Leiloes\Leilao::class,'vendedor_id');
    }
}
