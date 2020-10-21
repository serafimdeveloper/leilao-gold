<?php
/**
 * Created by PhpStorm.
 * User: Douglas Serafim
 * Date: 22/09/2016
 * Time: 23:40
 */

namespace Domain\Produtos;


use Domain\Itens\ItensRepository;
use Domain\Services\TipoItensAbstractServices;

class ProdutosService extends TipoItensAbstractServices
{
/*
* @var ProdutosRepository
*/
    protected $repo;

    /**
     * @var  ProdutosRepository
     */
    protected $item;

    /**
     * Construct.
     *
     * @param ProdutosRepository $repo
     * @param ItensRepository    $item
     */
    public function __construct(ProdutosRepository $repo, ItensRepository $item)
    {
        $this->repo = $repo;
        $this->item = $item;
    }

}