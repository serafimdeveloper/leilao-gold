<?php
/**
 * @Author: Leandro Henrique Reis <emtudo@gmail.com>
 * @Date:   2016-05-05 08:41:01
 * @Last Modified by:   Leandro Henrique Reis
 * @Last Modified time: 2016-06-04 19:51:54
 */

namespace Domain\Especificacoes\Http;

use Domain\Especificacoes\Especificacao;
use Domain\Http\Controllers\AbstractController;
use Domain\Categorias\Categoria;
use Domain\Especificacoes\Http\Requests\DeleteRequest;
use Domain\Especificacoes\Http\Requests\StoreRequest;
use Domain\Especificacoes\Http\Requests\UpdateRequest;
use Laracasts\Flash\Flash;
use Domain\Especificacoes\EspecificacoesRepository as Repository;

/**
 * It's don't work, because Requests and Repository don't exists.
 */
class EspecificacoesController extends AbstractController
{
    protected $with = ['categoria'];

    public function index()
    {
        $especificacoes = $this->repo->all($this->columns, $this->with, $this->load);
        return view('admin.especificacoes.index')->with('especificacoes',$especificacoes);
    }

    public function create(Categoria $categorias)
    {
        return view('admin.especificacoes.create')->with('categorias',$categorias->pluck('nome','id'));
    }

    public function store()
    {
        $request = $this->app->make($this->storeRequest());
        $save = $this->repo->store($request->all());
        if ($save) {
            Flash::success('A Especificação foi cadastrada com sucesso!');
            return redirect()->route('especificacoes.index');
        }
        return view('admin.errors.500');
    }

    public function edit(Especificacao $especificacao)
    {
        $categorias = Categoria::pluck('nome','id');
        return view('admin.especificacoes.create')->with('especificacao',$especificacao)->with('categorias',$categorias);
    }

    public function update($id)
    {
        $request = $this->app->make($this->updateRequest());
        $save = $this->repo->update($request->all(), $id);
        if ($save) {
            Flash::success('A categoria foi atualizada com sucesso!');
            return redirect()->route('Especificacoes.index');
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
