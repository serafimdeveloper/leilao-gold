<?php
	namespace Domain\Galerias\Http;

	use Domain\Http\Controllers\AbstractController;
	use Domain\Galerias\GaleriasRepository as Repository;

	class GaleriasController extends AbstractController
	{
		public function repo(){
			return Repository::class;
		}
	}