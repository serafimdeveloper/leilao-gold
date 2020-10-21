<?php
	namespace Domain\Lances\Http;
	use Domain\Http\Controllers\AbstractController;
	use Domain\Lances\LancesRepository as Repository;

	class LancesController extends AbstractController
	{
		public function repo(){
			returb Repository::class;
		}
	}