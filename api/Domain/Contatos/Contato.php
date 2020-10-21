<?php

namespace Domain\Contatos;

use Domain\BaseModel;

class Contato extends BaseModel
{
    protected $table = 'contatos';
    protected $fillable = ['usuario_id','tipo_contato','descricao','nome_contato','observacao'];
    
    public function usuario(){
        return $this->belongsTo(\Domain\Usuarios\Usuario::class);
    }
}
