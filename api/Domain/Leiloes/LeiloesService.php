<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Domain\Leiloes;
use Auth;
use DB;

/**
 * Description of LeiloesService
 *
 * @author DouglasSerafim
 */
class LeiloesService {
    protected $repo,$response,$lance;
    
    public function __construct(LeiloesRepository $repo, \Domain\Http\ResponseFactory $response, \Domain\Lances\LancesRepository $lance) {
        $this->repo = $repo;
        $this->response = $response;
        $this->lance = $lance;
    }
    
    public function inicia_leilao($leiloes){
        $hora = strtotime(date('Y-m-d H:i:s')) + 60;
        foreach($leiloes as $leilao){
            if($leilao['status'] === 'pendente'){
                if($hora >= strtotime($leilao['hora_inicio'])){
                    $this->repo->update(['status'=>'andamento'], $leilao['id']);
                } 
            }           
        }        
    }
    
    public function finaliza_leilao($leilao){
        $hora = strtotime(date('Y-m-d H:i:s')) + 2;
        if($leilao->status === 'andamento'){
           if($hora >= strtotime($leilao->hora_final)){            
                $leilao = $this->repo->update(['status'=>'fechado'], $leilao->id);
                $leilao = $this->repo->filter_leilao($leilao); 
                return $this->response->make(compact('leilao'),201);
            }
            $leilao = $this->repo->filter_leilao($leilao); 
            return $this->response->make(compact('leilao'),200); 
        }        
    }
    
    public function dar_lance($leilao){
        if($leilao->status !== 'fechado'){
            $usuario = Auth::User();
            if($usuario->qtd_lances > 0){
	            $usuario->decrement('qtd_lances');
	            $lance =  $this->lance->store(['usuario_id'=>$usuario->id,'leilao_id'=>$leilao->id,'hora'=>date('Y-m-d H:i:s')]);
	            $leilao->fill(['usuario_id'=>$usuario->id])->save();
	            $leilao->increment('quant_lances');
                $leilao = $leilao->load(['usuario']);
                $codigo = $this->acrescimos($leilao) ? $this->acrescimos($leilao) : 200;

                return $this->response->make(compact('leilao','usuario','lance','codigo'));             
            }
            return $this->response->make(['erro'=>'Quantidades de lances insuficientes'],402);   
        } 
        return $this->response->make(['erro'=>'Leilão Encerrado'],503);
    }

    public function hora(){
        return $this->response->make(date('Y-m-d H:i:s'));
    }
    
    private function acrescimos($leilao){
        if($leilao->tipo_leilao->tipo === 'tempo'){
            $acrescimo = strtotime(date('Y-m-d H:i:s')) + $leilao->tipo_leilao->valor;
            if($acrescimo >= strtotime($leilao->hora_final)){
               $leilao->fill(['hora_final'=>date('Y-m-d H:i:s', $acrescimo)])->save(); 
            }
        }else{
            if($leilao->valor === bcrypt($leilao->quantidade)){
                $leilao->fill(['status'=>'encerrado'])->save();
                return 100;
            }
        }
        return false;
    }
}
