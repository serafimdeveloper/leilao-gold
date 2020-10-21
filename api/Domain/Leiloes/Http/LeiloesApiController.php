<?php
namespace Domain\Leiloes\Http;

use Domain\Http\Controllers\AbstractController;
use Domain\Leiloes\LeiloesRepository as Repository;
use Domain\Http\Controllers\Traits\CrudTrait;
use Domain\Leiloes\Http\Requests\DeleteRequest;
use Domain\Leiloes\Http\Requests\StoreRequest;
use Domain\Leiloes\Http\Requests\UpdateRequest;
use Domain\Leiloes\Leilao;
use Domain\Leiloes\LeiloesService;

class LeiloesApiController extends AbstractController
{
    protected $with = ['tipo_leilao','usuario','vendedor','item','lances'];
    protected $service;
    
    public function __construct(\Illuminate\Container\Container $app,LeiloesService $service) {
        parent::__construct($app);
        $this->service = $service;
    }

    use CrudTrait;

    public function andamentos()
    {
        $leiloes = $this->repo->leiloes($this->columns, $this->with,[['status','!=','fechado']]);
        $this->service->inicia_leilao($leiloes);
        return $leiloes;
    }
        
    public function encerrados()
    {
       return $this->repo->leiloes($this->columns, $this->with,[['status','=','fechado']]); 
    }
    
    public function finaliza(Leilao $leiloe)
    {
        return $this->service->finaliza_leilao($leiloe);
    }
    
    public function dar_lance(Leilao $leiloe)
    {
       return $this->service->dar_lance($leiloe);
    }
    

    public function hora(){
        return $this->service->hora();
    }

    public function repo()
    {
        return Repository::class;
    }

    public function storeRequest()
    {
        return StoreRequest::class;
    }

    public function updateRequest()
    {
        return UpdateRequest::class;
    }

    public function deleteRequest()
    {
        return DeleteRequest::class;
    }
}