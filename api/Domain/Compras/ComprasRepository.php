<?php
	namespace Domain\Compras\Compra;

	use Domain\Repositories\BaseRepository;

	class ComprasRepository extends BaseRepository
	{
		public function model()
	    {
	        return Categoria::class;
	    }
	}