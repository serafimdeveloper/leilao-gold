<?php
	namespace Domain\TiposLeiloes;
	use Domain\Repositories\AbstractRepository;

	class TiposLeiloesRepository extends AbstractRepository
	{
		public function model(){
			return TipoLeilao::class;
		}
	}