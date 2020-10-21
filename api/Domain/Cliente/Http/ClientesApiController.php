<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Domain\Cliente\Http;
/**
 * Description of ClientesController
 *
 * @author DouglasSerafim
 */
use Domain\Http\Controllers\AbstractController;
use Domain\Cliente\ClientesService as Service;
use Domain\Cliente\ClientesRepository as Repository;
use Domain\Cliente\Http\Request\StoreRequest;

class ClientesApiController extends AbstractController {
    
    protected $service;
    
    public function __construct(\Illuminate\Container\Container $app,Service $service) {
        parent::__construct($app);
        $this->service = $service;
    }
    
    public function repo() {
        return Repository::class;
    }

    public function store(StoreRequest $request ){
        return $this->service->store($request->all());
    }
    
    public function getConfirm($email,$confirm_token){
      return $this->service->getTokenUser(['email'=>$email,'confirm_token'=>$confirm_token]);  
    }
    
    public function confirm(){
        return $this->service->confirm();
    }
//put your code here
}
