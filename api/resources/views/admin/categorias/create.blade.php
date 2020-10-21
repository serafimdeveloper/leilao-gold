@extends('admin.template.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box dark">
            <header>
                <div class="icons"><i class="fa fa-edit"></i></div>
                <h5>Input Text Fields</h5>
                <!-- .toolbar -->
                <div class="toolbar">
                    <nav style="padding: 8px;">
                        <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                            <i class="fa fa-minus"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-default btn-xs full-box">
                            <i class="fa fa-expand"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                            <i class="fa fa-times"></i>
                        </a>
                    </nav>
                </div>            <!-- /.toolbar -->
            </header>
            <div id="div-1" class="body collapse in" aria-expanded="true">
                <div class="col-lg-10 col-lg-offset-1">
                    @if(isset($categoria))
                        {!!Form::model($categoria,['route'=>['categorias.update',$categoria->id],'method'=>'PATCH'])!!}
                    @else
                    {!! Form::open(['route' => ['categorias.store'], 'method' => 'POST']) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('nome', 'Nome') !!}
                        {!! Form::text('nome',null, ['class' => 'form-control', 'placeholder' => 'Digite o nome da Categória']) !!}                          </div>
                    <div class="form-group">
                        {!! Form::label('descricao', 'Descrição') !!}
                        {!! Form::textarea('descricao',null, ['class' => 'form-control', 'placeholder' => 'Digite a descrição da Categória']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('categoria_id', 'Categória') !!}
                        {!! Form::select('categoria_id',$categorias,null, ['class' => 'form-control', 'placeholder' => 'Selecione uma Categória']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}         
                    </div>
                    {!!Form::close()!!}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endsection