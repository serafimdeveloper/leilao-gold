<?php
	namespace Domain\Vendedores;
	use Domain\Repositories\AbstractController;

	class Vendedores extends AbstractController
	{
		public function repo(){
			return Vendedor::class;
		}
	}