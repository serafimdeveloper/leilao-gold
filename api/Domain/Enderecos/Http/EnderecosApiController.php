<?php
	namespace Domain\Enderecos\Http;
		use Domain\Http\Controllers\AbstractController;
		use Domain\Enderecos\EnderecosRepository as Repository;

		class EnderecosApiController extends AbstractController
		{
			public function repo(){
				return Repository::class;
			}
		}
