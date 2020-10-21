<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Domain\Lances;

/**
 * Description of LancesRepository
 *
 * @author DouglasSerafim
 */
use  Domain\Repositories\BaseRepository;
class LancesRepository  extends BaseRepository{
    //put your code here
    public function model() {
        return Lance::class;
    }

}
