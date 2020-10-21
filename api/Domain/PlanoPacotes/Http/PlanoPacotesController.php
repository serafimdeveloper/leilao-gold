<?php
	namespace Domain\PlanoPacotes\Http;
	use Domain\Http\Controllers\AbstractController;
	use Domain\PlanoPacotes\PlanoPacotesRepository as Repository;

	class PlanoPacotesController extends AbstractController
	{
		public function repo(){
			return Repository::class;
		}
	}