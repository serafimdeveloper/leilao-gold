@extends('admin.template.main')

@section('content')

<div class="col-lg-12 ui-sortable">
        <div class="box ui-sortable-handle">
            <header>
                <div class="icons"><i class="fa fa-table"></i></div>
                <h5>Lista de Categórias</h5>
            </header>
            <div id="collapse4" class="body">
                <div class="col-lg-12" style="margin-bottom: 10px;">
                    <a href="{{route('categorias.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a>
                </div>
                <table class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Categória</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->nome}}</td>
                            <td>{{$categoria->descricao}}</td>
                            <td>{{$categoria->categoria['nome']}}</td>
                            <td><a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger"><i class="fa fa-remove"></i></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection