<?php

namespace Domain\Especificacoes;

use Domain\BaseModel;

class Especificacao extends BaseModel
{
    protected $table    = 'especificacoes';
    protected $fillable = ['categoria_id','nome','descricao'];
    
    public function categoria(){
        return $this->belongsTo(\Domain\Categorias\Categoria::class);
    }
}
