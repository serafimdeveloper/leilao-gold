<?php
namespace Domain\Categorias\Http;

use Domain\Http\Controllers\AbstractController;
use Domain\Categorias\Categoria;
use Domain\Categorias\Http\Requests\DeleteRequest;
use Domain\Categorias\Http\Requests\StoreRequest;
use Domain\Categorias\Http\Requests\UpdateRequest;
use Laracasts\Flash\Flash;
use Domain\Categorias\CategoriasRepository as Repository;

class CategoriasController extends AbstractController
{
    protected $with = ['categoria'];

    public function index()
    {
        $categorias = $this->repo->all($this->columns, $this->with, $this->load);
        return view('admin.categorias.index')->with('categorias',$categorias);
    }

    public function create()
    {
        $categorias = Categoria::pluck('nome','id');
        return view('admin.categorias.create')->with('categorias',$categorias);
    }

    public function store()
    {
        $request = $this->app->make($this->storeRequest());
        $save = $this->repo->store($request->all());
        if ($save) {
            Flash::success('A categoria foi cadastrada com sucesso!');
            return redirect()->route('categorias.index');
        }
        return view('admin.errors.500');
    }

    public function edit(Categoria $categoria)
    {
        $categorias = Categoria::pluck('nome','id');
        return view('admin.categorias.create')->with('categoria',$categoria)->with('categorias',$categorias);
    }

    public function update($id)
    {
        $request = $this->app->make($this->updateRequest());
        $save = $this->repo->update($request->all(), $id);
        if ($save) {
            Flash::success('A categoria foi atualizada com sucesso!');
            return redirect()->route('categorias.index');
        }
        return view('admin.errors.500');
    }

    public function destroy($id)
    {
        return $this->repo->delete($id);
    }

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
