<?php
	namespace Domain\FormaPagtos;

	use Domain\Repositories\BaseRepository;

	 class FormaPagtosRepository extends BaseRepository
	 {

	 	public function model(){
	 		return FormaPagtos::class;
	 	}
	 }