<?php
	namespace Domain\Usuarios\Http;
	use Domain\Http\Controllers\AbstractController;
	use Domain\Usuarios\UsuariosRepository as Repository;

	class UsuarioController extends AbstractController
	{
		public function repo(){
			return Repository::class;
		}
	}