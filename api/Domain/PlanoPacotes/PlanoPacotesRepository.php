<?php
	namespace Domain\PlanosPacotes;
	use Domain\Repositories\AbstractRepository;

	class PlanoPacotesRepository extends AbstractRepository
	{

		public function model(){
			return PlanoPacote::class;
		}
	}