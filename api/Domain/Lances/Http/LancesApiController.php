<?php
	namespace Domain\Lances\Http;
	use Domain\Http\Controllers\AbstractController;
	use Domain\Lances\LancesRepository as Repository;

	class LancesApiController extends AbstractController
	{
		public function repo(){
			return Repository::class;
		}
	}