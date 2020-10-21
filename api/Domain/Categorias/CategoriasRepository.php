<?php 

namespace Domain\Categorias;

use Domain\Repositories\BaseRepository;

class CategoriasRepository extends BaseRepository
{
    public function model()
    {
        return Categoria::class;
    }

    public function store(array $data)
    {
        if(isset($data['categoria_id'])){
            $data['categoria_id'] = ($data['categoria_id'] === "") ? null : $data['categoria_id'];
        }
        return parent::store($data);
    }

    public function update(array $data, $id)
    {
        if(isset($data['categoria_id'])){
            $data['categoria_id'] = ($data['categoria_id'] === "") ? null : $data['categoria_id'];
        }
        return parent::update($data,$id);
    }
}
