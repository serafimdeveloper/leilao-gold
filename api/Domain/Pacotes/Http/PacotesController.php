<?php
	namespace Domain\Pacotes\Http;
	 use Domain\Http\Controllers\AbstractController;
	 use Domain\Pacotes\PacotesRepository as Repository;

	 class PacotesController extends AbstractController
	 {
	 	public function repo(){
	 		return Repository::class;
	 	}
	 }