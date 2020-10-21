<?php
	namespace Domain\Clientes\Http;

	use Domain\Http\Controllers\AbstractController;
	use Domain\Cliente\ClientesRepository as Repository;


	class ClientesController extends AbstractController
	{

		public function repo() {
        	return Repository::class;
    	}
	}