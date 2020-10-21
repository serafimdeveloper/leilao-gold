<?php
	namespace Domain\Servicos;

	use Domain\Repositories\AbstractRepository;

	class ServicosRepository extends AbstractRepository
	{
		public function model(){
			return Servico::class;
		}
	}