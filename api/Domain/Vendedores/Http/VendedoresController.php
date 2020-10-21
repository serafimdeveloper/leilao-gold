<?php
	namespace Domain\Vendedores\Http;

	use Domain\Http\Controllers\AbstractController;
	use Domain\Vendedores\VendedorRepository as Repository;

	class VendedoresController extends AbstractController
	{
		public function model(){
			return Repository::class;
		}

	}