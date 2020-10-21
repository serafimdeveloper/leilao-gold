<?php
	namespace Domain\Enderecos;
	use Domain\Repositories\BaseRepository;

	class EnderecosRepository extends BaseRepository
	{
		public function model(){
			return Endereco::class;
		}
	}