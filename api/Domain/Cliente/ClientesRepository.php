<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Domain\Cliente;

/**
 * Description of ClientesRepository
 *
 * @author DouglasSerafim
 */
use Domain\Repositories\BaseRepository;
class ClientesRepository extends BaseRepository {
    public function model() {
        return Cliente::class;
    }
    
    public function storeRequest() {
        
    }

    public function updateRequest() {
        
    }
}
