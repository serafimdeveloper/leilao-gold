<?php
	namespace Domain\Compras\Http;
	use Domain\Http\Controllers\AbstractController;
	use Domain\Http\Compras\ComprasRepository as Repository;

	class ComprasController extends AbstractController
	{
		public function repo(){
			return Repository::class;
		}

	}
