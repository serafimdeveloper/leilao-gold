@extends('admin.template.main')

@section('content')

<div class="col-lg-12 ui-sortable">
        <div class="box ui-sortable-handle">
            <header>
                <div class="icons"><i class="fa fa-table"></i></div>
                <h5>Lista de Especificacões</h5>
            </header>
            <div id="collapse4" class="body">
                <div class="col-lg-12" style="margin-bottom: 10px;">
                    <a href="{{route('especificacoes.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a>
                </div>
                <table class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Categória</th>
                            <th>Nome</th>
                            <th>Descricao</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($especificacoes as $especificacao)
                        <tr>
                            <td>{{$especificacao->id}}</td>
                            <td>{{$especificacao->categoria['nome']}}</td>
                            <td>{{$especificacao->nome}}</td>
                            <td>{{$especificacao->descricao}}</td>
                            <td><a href="{{ route('especificacoes.edit', $especificacao->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger"><i class="fa fa-remove"></i></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection