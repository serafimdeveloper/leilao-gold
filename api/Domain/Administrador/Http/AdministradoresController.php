<?php

namespace Domain\Administrador\Http;

use Domain\Http\Controllers\AbstractController;
use Domain\Administrador\Administrador;
use Domain\Administrador\Http\Requests\DeleteRequest;
use Domain\Administrador\Http\Requests\StoreRequest;
use Domain\Administrador\Http\Requests\UpdateRequest;
use Domain\Administrador\AdministradoresService as Service;
use Laracasts\Flash\Flash;
use Domain\Administrador\AdministradoresRepository as Repository;

class AdministradoresController extends AbstractController
{

	protected $with = ['usuario'];

	public function index()
	{
		$administradores = $this->repo->all($this->columns, $this->with, $this->load);
        return view('admin.administradores.index')->with('administradores',$administradores);
	}

	 public function create()
    {
        return view('admin.administradores.create');
    }

    public function store(StoreRequest $request,Service $service)
    {
        $save = $service->store($request->all());
        if ($save) {
            Flash::success('O administrador foi cadastrado com sucesso!');
            return redirect()->route('administradores.index');
        }
        return view('admin.errors.500');
    }

    public function edit(Administrador $administrador)
    {
        return view('admin.administradores.create')->with('administrador',$administrador);
    }

    public function update(UpdateRequest $request, Service $service,$id)
    {
        $save = $service->update($request->all(), $id);
        if ($save) {
            Flash::success('O administrador foi atualizado com sucesso!');
            return redirect()->route('administradores.index');
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

    public function restore($id)
    {
        return $this->repo->restore($id);
    }

    public function forceDelete($id)
    {
        return $this->repo->forceDelete($id);
    }

    public function deleteRequest()
    {
        return DeleteRequest::class;
    }

}