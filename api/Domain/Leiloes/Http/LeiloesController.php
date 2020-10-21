<?php
	namespace Domain\Leiloes\Http;

	use Domain\Http\Controllers\AbstractController;
	use Domain\Leiloes\LeiloesRepository as Repository;
	use Domain\Http\Controllers\Traits\CrudTrait;
	use Domain\Leiloes\Http\Requests\DeleteRequest;
	use Domain\Leiloes\Http\Requests\StoreRequest;
	use Domain\Leiloes\Http\Requests\UpdateRequest;

	class LeiloesController extends AbstractController
	{
		protected $with = ['tipo_leilao','usuario','vendedor','item','lances'];

		public function repo()
	    {
	        return Repository::class;
	    }

	    public function storeRequest()
	    {
	        return StoreRequest::class;
	    }

	    public function updateRequest()
	    {
	        return UpdateRequest::class;
	    }

	    public function deleteRequest()
	    {
	        return DeleteRequest::class;
	    }
	}