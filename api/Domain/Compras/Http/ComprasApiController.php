<?php
	namespace Domain\Compras\Http;

	use Domain\Http\Controllers\AbstractController;
	use Domain\Compras\ComprasRepository as Respository;

	class ComprasApiController extends ABstractController
	{
		public function repo(){
			return Respository::class;
		}
	}