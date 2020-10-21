<?php

namespace Domain\Usuarios;

use Domain\Repositories\BaseRepository;

class UsuariosRepository extends BaseRepository {

    public function model() {
        return Usuario::class;
    }

    public function storeRequest() {
        
    }

    public function updateRequest() {
        
    }

    public function getUsuario(array $condicao) {
        if($usuario = $this->model->where($condicao)->first()){
            $usuario->load('usuario');
             return $usuario;
        }
        return false;
        
    }

}
