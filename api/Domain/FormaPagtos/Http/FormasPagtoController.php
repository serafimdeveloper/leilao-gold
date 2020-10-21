<?php
	namespace Domain\FormaPagtos\Http;

	use Domain\Http\Controllers\AbstractController;
	use Domain\FormaPagtos\FormaPagtosRepository as Repository;

	class FormaPagtosController extends AbstractController
	{
		public function repo(){
			return Repository::class;
		}
	}