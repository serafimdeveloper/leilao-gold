<?php
namespace Domain\Administrador;

use Domain\Repositories\BaseRepository;

class AdministradoresRepository extends BaseRepository
{

	public function model()
    {
        return Administrador::class;
    }
} 