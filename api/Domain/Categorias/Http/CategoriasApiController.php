<?php
	namespace Domain\Categorias\Http;

	use Domain\Http\Controllers\AbstractController;
	use Domain\Categorias\Categoria;
	use Domain\Categorias\Http\Requests\DeleteRequest;
	use Domain\Categorias\Http\Requests\StoreRequest;
	use Domain\Categorias\Http\Requests\UpdateRequest;
	use Laracasts\Flash\Flash;
	use Domain\Categorias\CategoriasRepository as Repository;
	
	class CategoriasApiController extends AbstractController
	{

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