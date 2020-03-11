@extends('layouts.app')
@section('title','Solicitação de Orçamentos')
@section('body')
    <div class="container mt-5 pt-5">
        <div class="card card-orcamento mt-3 pt-3">
            <div class="py-3 text-center">
                <h2>Solicitação de Orçamentos</h2>
            </div>
            <div class="card-body">
                <form action="/orcamento" method="post" enctype="multipart/form-data" id="formulario">
                    @csrf

{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <div class="form-row">--}}
                    <div class="form-group">
                        <label for="nome">*Nome Completo</label>
                        <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                               name="nome" id="nome" value="{{ old('nome') }}">
                        @if($errors->has('nome'))
                            <div class=" {{$errors->has('nome') ? 'invalid-feedback' : ''}}">{{$errors->first('nome')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="telefone">*Telefone (WhatsApp)</label>
                        <input type="text" class="form-control telefone {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                               name="telefone" id="telefone" value="{{ old('telefone') }}">
                        @if($errors->has('telefone'))
                            <div class=" {{$errors->has('telefone') ? 'invalid-feedback' : ''}}">{{$errors->first('telefone')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                               name="email" id="email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <div class="{{ $errors->has('email') ? 'invalid-feedback' : ''}}">{{$errors->first('email')}}</div>
                        @endif
                    </div>

                    <div class="form-row">

                        <div class="form-group col-sm-4">
                            <label for="parte_corpo">*Parte do Corpo</label>
                            <select class="form-control parte_corpo {{ $errors->has('parte_corpo') ? 'is-invalid' : '' }}"
                                    name="parte_corpo" id="parte_corpo">
                                <option value="">Selecione...</option>
                                <option value="Antebraço" {{old('parte_corpo') === 'Antebraço' ? 'selected' : ''}}>Antebraço</option>
                                <option value="Barriga" {{old('parte_corpo') === 'Barriga' ? 'selected' : ''}}>Barriga</option>
                                <option value="Braço" {{old('parte_corpo') === 'Braço' ? 'selected' : ''}}>Braço</option>
                                <option value="Costas" {{old('parte_corpo') === 'Costas' ? 'selected' : ''}}>Costas</option>
                                <option value="Costela" {{old('parte_corpo') === 'Costela' ? 'selected' : ''}}>Costela</option>
                                <option value="Coxa" {{old('parte_corpo') === 'Coxa' ? 'selected' : ''}}>Coxa</option>
                                <option value="Mão" {{old('parte_corpo') === 'Mão' ? 'selected' : ''}}>Mão</option>
                                <option value="Nádegas" {{old('parte_corpo') === 'Nádegas' ? 'selected' : ''}}>Nádegas</option>
                                <option value="Pé" {{old('parte_corpo') === 'Pé' ? 'selected' : ''}}>Pé</option>
                                <option value="Peito" {{old('parte_corpo') === 'Peito' ? 'selected' : ''}}>Peito</option>
                                <option value="Perna" {{old('parte_corpo') === 'Perna' ? 'selected' : ''}}>Perna</option>
                                <option value="Perna" {{old('parte_corpo') === 'Panturrilha' ? 'selected' : ''}}>Panturrilha</option>
                                <option value="Pulso" {{old('parte_corpo') === 'Pulso' ? 'selected' : ''}}>Pulso</option>
                                <option value="Tornozelo" {{old('parte_corpo') === 'Tornozelo' ? 'selected' : ''}}>Tornozelo</option>
                                <option value="Outra" {{old('parte_corpo') === 'Outra' ? 'selected' : ''}}>Outra (especifique ao lado)</option>
                            </select>
                            @if($errors->has('parte_corpo'))
                                <div class=" {{$errors->has('parte_corpo') ? 'invalid-feedback' : ''}}">{{$errors->first('parte_corpo')}}</div>
                            @endif
                        </div>

                        <div class="form-group col-sm-8">
                            <label for="outra_parte" class="outra_parte" hidden>Outra Parte do Corpo (Especifique)</label>
                            <input type="text" class="form-control outra_parte {{ $errors->has('outra_parte') ? 'is-invalid' : '' }}"
                                   value="{{old('outra_parte')}}" name="outra_parte" id="outra_parte" hidden>
                            @if($errors->has('outra_parte'))
                                <div class=" {{$errors->has('outra_parte') ? 'invalid-feedback' : ''}}">{{$errors->first('outra_parte')}}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tamanho">*Tamanho da Tatuagem</label>
                        <input type="text" class="form-control {{ $errors->has('tamanho') ? 'is-invalid' : '' }}"
                               name="tamanho" id="tamanho" value="{{ old('tamanho') }}" aria-describedby="descricaoTamanho"
                               placeholder="Exemplo: 7x4cm">
                        <small id="descricaoTamanho" class="form-text text-muted">
                            Informe o tamanho da tatuagem (largura e comprimento) em centímetros (cm).
                        </small>
                        @if($errors->has('tamanho'))
                            <div class=" {{$errors->has('tamanho') ? 'invalid-feedback' : ''}}">{{$errors->first('tamanho')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>*Cor</label>
                        <div class="form-row ml-0">
                            <div class="form-check form-check-inline">
                                @if($errors->has('cor'))
                                    <div class=" {{$errors->has('cor') ? 'invalid-feedback' : ''}}">{{$errors->first('cor')}}</div>
                                @endif
                                <input class="form-check-input {{ $errors->has('cor') ? 'is-invalid' : '' }}"
                                       type="radio" name="cor" id="pb"
                                       value="pb" {{old('cor') === 'pb' ? 'checked' : ''}}>
                                <label class="form-check-label" for="pb">Preto e Branco</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input {{ $errors->has('cor') ? 'is-invalid' : '' }}"
                                       type="radio" name="cor" id="colorido"
                                       value="colorido" {{old('cor') === 'colorido' ? 'checked' : ''}}>
                                <label class="form-check-label" for="colorido">Colorido</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="arquivo">Selecione uma imagem de referência (Tamanho máximo de 5mb).</label>
                            <input type="file" class="form-control-file" id="arquivo" name="arquivo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="descricao">*Forneça uma descrição sobre como deseja fazer a tatuagem.</label>
                        <textarea class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}"
                                  id="descricao" name="descricao" rows="3"
                                  aria-describedby="descricao">{{old('descricao')}}</textarea>
                        <small id="descricao" class="form-text text-muted ">
                            Quanto mais informações você inserir, mais rádido será o retorno.
                        </small>
                        @if($errors->has('descricao'))
                            <div class=" {{$errors->has('descricao') ? 'invalid-feedback' : ''}}">{{$errors->first('descricao')}}</div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

            </div>
        </div>

    </div>
@endsection
