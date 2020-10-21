<?php 
	namespace Domain\Contatos\Contato;

	use Domain\Repositories\BaseRepository;

	class ContatosRespository extends BaseRespository
	{

		public function model()
		{
			return Contato::class;
		}
	}