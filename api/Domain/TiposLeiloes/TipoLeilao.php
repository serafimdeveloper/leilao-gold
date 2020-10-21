<?php

namespace Domain\TiposLeiloes;

use Domain\BaseModel;
class TipoLeilao extends BaseModel
{
    protected $table = 'tipo_leiloes';
    protected $fillable = ['nome','tipo','valor','descricao'];
    
    public function leiloes(){
        return $this->hasMany(\Domain\Leiloes\Leilao::class,'tipo_leilao_id');
    }
}
