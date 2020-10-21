<?php
	namespace Domain\Vendedores\Http;

	use Domain\Http\Controllers\AbstractController;
	use Domain\Vendedores\VendedorRepository as Repository;

	class VendedoresApiController extends AbstractController
	{
		public function model(){
			return Repository::class;
		}

	}