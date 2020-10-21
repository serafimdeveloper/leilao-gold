<?php
	namespace Domain\Itens\Http;

	use Domain\Http\Controllers\AbstractController;
	use Domain\Itens\ItensRepository as Repository;

	class ItensController extends AbstractController
	{
		public function repo(){
			return Repository::class;
		}
	}