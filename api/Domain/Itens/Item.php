<?php

namespace Domain\Itens;

use Domain\BaseModel;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Item extends BaseModel implements SluggableInterface {

    protected $table = 'itens';
    protected $fillable = ['tipo', 'usuario_id', 'categoria_id', 'nome', 'descricao', 'valor', 'quantidade'];

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'nome',
        'save_to' => 'slug'
    ];

    public function item() {
        return $this->morphTo();
    }

    public function usuario() {
        return $this->belongsTo(\Domain\Usuarios\Usuario::class);
    }

    public function categoria() {
        return $this->belongsTo(\Domain\Categorias\Categoria::class);
    }

    public function galerias() {
        return $this->hasMany(\Domain\Galerias\Galeria::class);
    }
    
    public function leiloes(){
        return $this->hasMany(\Domain\Leiloes\Leilao::class);
    }

}
