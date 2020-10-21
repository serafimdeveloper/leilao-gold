<?php

namespace Domain\Categorias;

use Domain\BaseModel;

class Categoria extends BaseModel {

    protected $table = 'categorias';
    protected $fillable = ['nome', 'descricao','categoria_id'];

    public function itens() {
         return $this->hasMany(\Domain\Itens\Item::class,'item_id');
    }

    public function categoria(){
        return $this->hasOne(\Domain\Categorias\Categoria::class,'id','categoria_id');
    }

    public function scopeSearch($query, $nome) {
        return $query->where('nome', 'LIKE', "%$nome%");
    }

}
