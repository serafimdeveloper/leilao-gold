<?php

namespace Domain\Lances;

use Domain\BaseModel;

class Lance extends BaseModel
{
    protected $table = 'lances';
    protected $fillable = ['usuario_id','leilao_id','hora'];
    public $timestamps = false;
    
    public function leilao(){
        return $this->belongsTo(\Domain\Leiloes\Leilao::class,'leilao_id');
    }
    
    public function usuario(){
        return $this->belongsTo(\Domain\Usuarios\Usuario::class,'usuario_id');
    }
}
