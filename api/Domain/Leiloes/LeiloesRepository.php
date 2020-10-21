<?php

namespace Domain\Leiloes;

use Domain\Repositories\BaseRepository;

class LeiloesRepository extends BaseRepository {

    public function model() {
        return Leilao::class;
    }

    public function leiloes(array $columns = ['*'], array $with = [], array $where = [], $orders = [], $limit = 20, $page = 1) {
        $leilao = $this->model;
        if (!empty($with)) {
            $leilao = $leilao->with($with);
        }
        if (!empty($where)) {
            $leilao = $leilao->where($where);
        }
        
        foreach ($orders as $order) {
            $order['order'] = isset($order['order']) ? $order['order'] : 'ASC';

            $leilao = $leilao->orderBy($order['column'], $order['order']);
        }
        $leilao = $leilao->paginate($limit, $columns, 'page', $page);
        $leilao = $leilao->map(function($dados) {
            return $this->filter_leilao($dados);
        });
        return $leilao;
    }
    
    public function filter_leilao($dados){
        $retorno = [
                'id' => $dados->id,
                'nome' => $dados->nome,
                'descricao' => $dados->descricao,
                'data_inicial' => $dados->data_inicial,
                'data_final' => $dados->data_final,
                'hora_inicio' => $dados->hora_inicio,
                'hora_final' => $dados->hora_final,
                'status' => $dados->status,
                'frete' => $dados->frete,
                'tipo_leilao' => [
                    'id' => $dados->tipo_leilao->id,
                    'nome' => $dados->tipo_leilao->nome,
                    'tipo' => $dados->tipo_leilao->tipo,
                    'valor' => $dados->tipo_leilao->valor,
                    'descricao' => $dados->tipo_leilao->descricao
                ],
                'vendedor' => [
                    'id' => $dados->vendedor->id,
                    'reputacao' => $dados->vendedor->reputacao,
                    'usuario' => [
                        'id' => $dados->vendedor->usuario->id,
                        'nome' => $dados->vendedor->usuario->nome,
                        'username' => $dados->vendedor->usuario->username,
                        'avatar' => $dados->vendedor->usuario->avatar
                    ]
                ],
                'lances'=> $dados->lances->reverse()->map(function($lance){
                    return [
                        'id'=>$lance->id,
                        'hora'=>$lance->hora,
                        'usuarios'=>[
                            'id'=>$lance->usuario->id,
                            'nome'=>$lance->usuario->nome,
                            'username'=>$lance->usuario->username,
                            'avatar'=>$lance->usuario->avatar
                        ]
                    ];
                }),
                'item' => [
                    'id' => $dados->item->id,
                    'nome' => $dados->item->nome,
                    'descricao' => $dados->item->descricao,
                    'valor'=>$dados->item->valor,
                    'quantidade'=>$dados->item->quantidade,
                    'categoria'=>[
                        'id'=>$dados->item->categoria->id,
                        'nome'=>$dados->item->categoria->nome,
                        'descricao'=>$dados->item->categoria->descricao
                    ],
                    'galerias'=>$dados->item->galerias->map(function($galeria){
                        return [
                            'id'=>$galeria->id,
                            'imagem'=>$galeria->imagem
                        ];                                    
                    })
                ]
            ];
            if (isset($dados->usuario)) {
                $retorno['usuarios'] = [
                   'id' => isset($dados->usuario->id) ? $dados->usuario->id : '',
                   'nome' => isset($dados->usuario->nome) ? $dados->usuario->nome : '',
                   'username' => isset($dados->usuario->username) ? $dados->usuario->username : '',
                   'avatar' => isset($dados->usuario->avatar) ? $dados->usuario->avatar : ''
                ];
            }
            return $retorno;
    }
}
