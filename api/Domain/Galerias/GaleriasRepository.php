<?php
	namespace Domain\Galerias;

	use Domain\Repositories\BaseRepository;

	class GaleriasRepository extends BaseRepository
	{
		public function model()
		{
			return Galeria::class;
		}
	}