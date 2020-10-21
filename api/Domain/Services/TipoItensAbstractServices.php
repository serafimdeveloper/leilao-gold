<?php
/**
 * Created by PhpStorm.
 * User: Douglas Serafim
 * Date: 20/09/2016
 * Time: 13:07
 */

namespace Domain\Services;


abstract class TipoItensAbstractServices
{

    public function store(array  $data)
    {
        $repo = $this->repo->store($data);
        $repo->load('item');
        $this->storeItem($data,$repo);
        return $repo;
    }

    public function update(array $data, $id)
    {
        $repo = $this->repo->update($data, $id);
        $item = $repo->item;
        if (isset($item->id)) {
            $this->updateItem($data, $item->id);
        } else {
            $this->storeItem($data, $repo);
        }
        $repo->load('item');

        return $repo;
    }

    private function storeItem(array $data, $repo)
    {
        $itemData = [
            'item_id' => $repo->id,
            'tipo_item' => get_class($repo),
            'usuario_id' => $data['usuario_id'],
            'categoria_id' => $data['categoria_id'],
            'nome' => $data['nome'],
            'descricao'=>$data['descricao'],
            'valor'=>$data['valor'],
            'quantidade'=>$data['quantidade']
        ];

        return $this->user->store($itemData);
    }

    private function updateItem(array $data, $id)
    {
        $itemData = [
            'usuario_id' => $data['usuario_id'],
            'categoria_id' => $data['categoria_id'],
            'nome' => $data['nome'],
            'descricao'=>$data['descricao'],
            'valor'=>$data['valor'],
            'quantidade'=>$data['quantidade']
        ];
        return $this->user->update($itemData, $id);
    }
}