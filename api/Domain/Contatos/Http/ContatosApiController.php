<?php
	namespace Domain\Contatos\Http;
    use Domain\Http\Controllers\AbstractController;
    use Domain\Contatos\ContatosRepository as Repository;

    class ContatosApiController extends AbstractController
    {
    	public function repo(){
    		return Repository::class;
    	}

    }
