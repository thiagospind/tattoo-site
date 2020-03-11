@extends('layouts.app')
@section('title','Solicitação de Orçamentos')
@section('body')
    <div class="container mt-5 pt-5">
        {{--<div class="card mt-3 pt-3">--}}
            <div class="py-3 text-center text-white">
                <h2>Visualização de Orçamentos</h2>
            </div>
            {{--<div class="card-body">--}}
                <form action="/orcamento/pesquisar" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <select class="form-control col-sm-8 col-md-6 col-lg-3 bg-transparent btn-outline-light" name="filtro" >
                            <option disabled selected style="display: none;" value="">Filtros</option>
                            <option value="nome" {{$filtro === 'nome' ? 'selected' : ''}}>Nome</option>
                            <option value="telefone" {{$filtro === 'telefone' ? 'selected' : ''}}>Telefone</option>
                            <option value="email" {{$filtro === 'email' ? 'selected' : ''}}>Email</option>
                            <option value="parte_corpo" {{$filtro === 'parte_corpo' ? 'selected' : ''}}>Parte do Corpo</option>
                            <option value="descricao" {{$filtro === 'descricao' ? 'selected' : ''}}>Palavra Chave (Descrição)</option>
                        </select>
                        <input type="text" class="form-control col-12 bg-transparent text-white" id="valor" name="valor" value="{{ $valor }}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                            <label for="data_inicio" class="text-white">Data Inicial</label>
                            <input class="form-control bg-transparent text-white" type="date" name="data_inicio" id="data_inicio"
                                   value="{{$data_inicio}}">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                            <label for="data_fim" class="text-white">Data Final</label>
                            <input class="form-control bg-transparent text-white" type="date" name="data_fim" id="data_fim"
                                   value="{{$data_fim}}">
                        </div>
                    </div>
                    <button class="btn btn-outline-light mt-2" type="submit">Pesquisar</button>
                </form>
                @if(count($orcamento) > 0 )
                    @foreach($orcamento as $orc)
                        <form action="/orcamento/salvar" method="post">
                            <div id="accordion" class="mt-2">
                                {{--<div class="card-visualiza-orcamento border rounded" id="heading{{$orc->id}}">--}}
                                <div class="card bg-card-orcamento mb-3">

                                    <div class="card-header" id="heading{{$orc->id}}">
                                        @if($orc->status === 'Novo')
                                            <span class="badge badge-success">Novo</span>
                                        @elseif($orc->status === 'Enviado')
                                            <span class="badge badge-info">Enviado</span>
                                        @endif
                                        <div class="form-row" data-toggle="collapse" data-target="#collapse{{$orc->id}}"
                                             aria-expanded="true" aria-controls="collapse{{$orc->id}}">
                                            <div class="form-group col-12">
                                                <label for="nome" class=""><strong>{{$orc->nome}}</strong></label>
                                                {{--<input class="form-control bg-transparent" name="nome" value="{{$orc->nome}}" disabled>--}}
                                            </div>
                                            <div class="form-group col-12">
                                                {{--<textarea class="form-control bg-transparent mt-2" disabled>{{$orc->descricao}}</textarea>--}}
                                                <label class="col-12"><h6><strong>Descrição: </strong>{{$orc->descricao}}</h6></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapse{{$orc->id}}" class="collapse bg-card-orcamento-interno" aria-labelledby="heading{{$orc->id}}" data-parent="#accordion">
                                        <div class="card-body text-white">
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                                    <label>Data</label>
                                                    <input class="form-control bg-transparent"
                                                           value="{{date('d/m/Y', strtotime( $orc->created_at))}}" name="data" disabled>

                                                    {{--<h6>{{$orc->email}}</h6>--}}
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                                    <label>Telefone</label>
                                                    <input class="form-control bg-transparent"
                                                           value="{{ $orc->telefone }}" name="telefone" disabled>
                                                    {{--<h6>{{$orc->email}}</h6>--}}
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-5">
                                                    <label>Email</label>
                                                    <input class="form-control bg-transparent" value="{{ $orc->email }}" disabled>
                                                    {{--<h6>{{$orc->email}}</h6>--}}
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                    <label>Parte Corpo</label>
                                                    <input class="form-control bg-transparent"
                                                           value="{{ $orc->parte_corpo === 'Outra' ? $orc->outra_parte : $orc->parte_corpo }}" disabled>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                                    <label>Tamanho</label>
                                                    <input class="form-control bg-transparent"
                                                           value="{{$orc->tamanho_tattoo}}" disabled>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                                    <label>Cor</label>
                                                    <input class="form-control bg-transparent"
                                                           value="{{$orc->cor === 'pb' ? 'Preto e Branco' : 'Colorido'}}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-12">
                                                    <img src="{{ asset('/storage/'.$orc->imagem_exemplo) }}" class="img-thumbnail rounded mx-auto d-block imagem-exemplo bg-transparent" alt="Referência" title="Imagem de Referência">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="observacao">Observações</label>
                                                    <textarea class="form-control bg-transparent"
                                                              rows="3">{{$orc->observacao !== null ? $orc->observacao : old('observacao')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-12">
                                                    <label for="valor">Valor</label>
                                                    <input class="form-control bg-transparent" name="valor" id="valor" value="{{$orc->valor}}">
                                                </div>
                                            </div>
                                            @if(isset($orc->email))
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkEmail" name="chkEmail">
                                                    <label class="form-check-label" for="chkEmail">
                                                        Enviar email de retorno do orçamento!
                                                    </label>
                                                </div>
                                            @endif
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                    {{$orcamento->appends(request()->input())->links()}}
                @endif
            </div>
        {{--</div>--}}
    {{--</div>--}}
@endsection
