<?php

namespace Domain\Administrador;

use Domain\Services\PersonAbstractService;
use Domain\Administrador\AdministradoresRepository;
use Domain\Usuarios\UsuariosRepository;

class AdministradoresService extends PersonAbstractService
{
    /**
     * @var StudentRepository
     */
    protected $repo;

    /**
     * @var  UserRepository
     */
    protected $user;

    /**
     * Construct.
     *
     * @param StudentRepository $repo
     * @param UserRepository    $user
     */
    public function __construct(AdministradoresRepository $repo, UsuariosRepository $user)
    {
        $this->repo = $repo;
        $this->user = $user;
    }
}
