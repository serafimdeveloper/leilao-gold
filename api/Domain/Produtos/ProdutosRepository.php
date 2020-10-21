<?php
/**
 * Created by PhpStorm.
 * User: Douglas Serafim
 * Date: 22/09/2016
 * Time: 23:34
 */

namespace Domain\Produtos;


use Domain\Repositories\BaseRepository;

class ProdutosRepository extends BaseRepository
{
    public function model(){
        return Produto::class;
    }

}