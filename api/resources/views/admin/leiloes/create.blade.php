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
                        {!! Form::open(['route' => ['categorias.store'], 'method' => 'POST']) !!}
                        <div class="col-lg-7">
                            <div class="form-group">
                                {!! Form::label('evento_id', 'Evento') !!}
                                {!! Form::select('evento_id',$eventos, 0, ['class' => 'form-control', 'placeholder' => 'Selecione um Evento']) !!}
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                {!! Form::label('tipo_leilao_id', 'Tipo de Leilão') !!}
                                {!! Form::select('tipo_leilao_id',$tipo_leilao, 0, ['class' => 'form-control', 'placeholder' => 'Selecione um Tipo de Leilão']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('vendedor_id', 'Vendedor') !!}
                                {!! Form::select('vendedor_id',$vendedor, 0, ['class' => 'form-control', 'placeholder' => 'Selecione uma Vendedor']) !!}
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-control">
                                {!! Form::label('hora_inicio', 'Hora Início') !!}
                                {!! Form::text('hora_inicio',null, ['class' => 'form-control', 'placeholder' => 'Digite a Hora Inicial', 'required']) !!}
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-control">
                                {!! Form::label('hora_final', 'Hora Final') !!}
                                {!! Form::text('hora_final',null, ['class' => 'form-control', 'placeholder' => 'Digite a Hora Final']) !!}
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-control">
                                {!! Form::label('status','Status') !!}
                                {!! Form::select('status',$status,0,['class' => 'form-control', 'placeholder' => 'Selecione um Status']) !!}
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-control">
                                {!! Form::label('frete','Frete') !!}
                                {!! Form::select('frete',['sim','nao'],0,['class' => 'form-control', 'placeholder' => 'Selecione um Status']) !!}
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="checkbox anim-checkbox">
                                <input type="checkbox" id="frete_correio" name="frete_correio">
                                <label for="frete_correio">Frete dos Correios</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-control">
                                {!! Form::label('cep', 'Hora CEP') !!}
                                {!! Form::text('cep',null, ['class' => 'form-control', 'placeholder' => 'Digite o CEP de onde se encontra o item']) !!}
                            </div>
                        </div>
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