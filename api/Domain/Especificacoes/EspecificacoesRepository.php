<?php 

namespace Domain\Especificacoes;

use Domain\Repositories\BaseRepository;

class EspecificacoesRepository extends BaseRepository
{
    public function model()
    {
        return Especificacao::class;
    }
}
