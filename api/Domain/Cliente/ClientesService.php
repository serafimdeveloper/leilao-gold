<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Domain\Cliente;

/**
 * Description of ClientesService
 *
 * @author DouglasSerafim
 */
use Domain\Services\PersonAbstractService;
use Domain\Usuarios\UsuariosRepository;
use Domain\Auth\AuthService;
use Domain\Http\ResponseFactory;
use Auth;
use Mail;

class ClientesService extends PersonAbstractService {

    protected $repo, $user, $auth, $response;

    public function __construct(ClientesRepository $repo, UsuariosRepository $user, AuthService $auth, ResponseFactory  $response) {
        $this->user = $user;
        $this->repo = $repo;
        $this->auth = $auth;
        $this->response = $response;
    }

    public function store(array $data) {
        if ($usuario = parent::store($data)) {
            $dados = [
                'nome' => $usuario->usuario->nome,
                'email' => $usuario->usuario->email,
                'confirm_token' => $usuario->usuario->confirm_token
            ];
            Mail::send('mails.register', ['data' => $dados], function($mail) use($dados) {
                $mail->to($dados['email'])->subject('Confirmação de sua conta');
            });
            return $this->response->make($usuario,200);
        }
        return $this->response->make(['erro'=>'Ocorreu um erro ao gravar'],400);
    }
    
    public function getTokenUser($credencials){
        if($usuario = $this->user->getUsuario($credencials)){
            if($usuario->ativo == 1 && $usuario->usuario->aceita == 1){
                return $this->response->make(['reposta'=>'Cadastro já confirmado'],300);
            }
            $token = $this->auth->getTokenUser($usuario);
            return compact('usuario','token');
        }
        return $this->response->make(['erro'=>'Token ou email inválido'],401);
        
    }
    
    public function confirm(){
        $usuario  = Auth::User();
        $usuario->fill(['confirm_token'=> str_random(20)])->save();
        $usuario->usuario->fill(['data_assinatura'=>date('Y-m-d H:i:s'),'ip_assinatura'=>$_SERVER['REMOTE_ADDR'],'aceita'=>1]);
        if($usuario->usuario->save()){
            return $this->response->make(['mensagem'=>'Conta confirmada com sucesso!'],200);
        }
        return $this->response->make(['erro'=>'Ocorreu um erro ao confirmar a conta'],500);        
    }

}