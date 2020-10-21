<?php
	namespace Domain\TiposLeiloes\Http;

	use Domain\Http\Controllers\AbstractController;
	use Domain\TiposLeiloes\TiposLeiloesRepository as Repository;

	class TiposLeiloesController extends AbstractController
	{
		public function repo(){
			return Repository::class;
		}
	}
