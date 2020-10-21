<?php
/**
 * @Author: Leandro Henrique Reis <emtudo@gmail.com>
 * @Date:   2016-05-05 08:41:12
 * @Last Modified by:   Leandro Henrique Reis
 * @Last Modified time: 2016-06-04 19:52:09
 */

namespace Domain\Services;

abstract class PersonAbstractService
{
    public function store(array $data)
    {
        $repo = $this->repo->store($data);
        $this->storeUsuario($data, $repo);

        $repo->load('usuario');
        return $repo;
    }

    public function update(array $data, $id)
    {
        $repo = $this->repo->update($data, $id);
        $user = $repo->usuario;
        if (isset($user->id)) {
            $this->updateUsuario($data, $user->id);
        } 
        $repo->load('usuario');

        return $repo;
    }

    private function storeUsuario(array $data, $repo)
    {
        $userData = [
            'usuario_id' => $repo->id,
            'usuario_type' => get_class($repo),
            'username' => $data['username'],
            'nome'=>$data['nome'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'remember_token' => str_random(20),
            'confirm_token' => str_random(20),
            'ativo'=> 1,
            'avatar'=>isset($data['avatar']) ? $data['avatar'] : url('/imagens/usuarios/default.jpg')            
        ];
        return $this->user->store($userData);
    }

    private function updateUsuario(array $data, $id)
    {
        $userData = [
            'username' => $data['username'],
            'email' => $data['email']
        ];

        return $this->user->update($userData, $id);
    }
}
