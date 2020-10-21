<?php
	namespace Domain\Pacotes;

	use Domain\Repositories\BaseRepository;

	class PacotesRepository extends BaseRepository
	{
		public function model()
		{
			return Pacote::class;
		}

	}