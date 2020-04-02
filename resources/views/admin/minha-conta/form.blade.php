@extends('admin.template')
@section('titulo-corpo','Minha conta')

@section('conteudo')
    <form method="post" enctype="multipart/form-data"
          action="{{route('perfil.atualizar')}}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-12"><h4 class="m-t-0 m-b-30 header-title">Meus dados</h4></div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nome">Nome:</label>
                                        <input type="text" class="form-control" id="nome" name="nome"
                                               placeholder="Nome"
                                               value="{{old('nome') ?: (isset($usuario) ? $usuario->name : null)}}">
                                        {!! $errors->first('nome','<span class="help-block text-danger"><small>:message</small></span>')!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email"
                                               value="{{old('email') ?: (isset($usuario) ? $usuario->email : null)}}">
                                        {!! $errors->first('email','<span class="help-block text-danger"><small>:message</small></span>')!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Senha:</label>
                                        <input class="form-control" type="password" id="password" name="password"
                                               placeholder="Senha">
                                        {!! $errors->first('password','<span class="help-block text-danger"><small>:message</small></span>')!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-right">
                            <hr>
                            <button class="btn btn-success waves-light waves-effect">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
