<?php
/**
 * Created by PhpStorm.
 * User: Douglas Serafim
 * Date: 23/09/2016
 * Time: 00:22
 */

namespace Domain\Itens;


use Domain\Repositories\BaseRepository;

class ItensRepository extends BaseRepository
{

    public function model()
    {
        return Item::class;
    }
}