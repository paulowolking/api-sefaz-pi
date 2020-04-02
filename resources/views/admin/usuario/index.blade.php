@extends('admin.template')
@section('titulo-corpo','Usuários')

@section('header')
    <!-- Table Responsive css -->
    <link href="{{ asset('gestor/css/rwd-table.min.css') }}" rel="stylesheet" type="text/css" media="screen">
    <!-- Modal -->
    <link href="{{ asset('gestor/css/custombox.min.css') }}" rel="stylesheet">
@endsection

@section('conteudo')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 m-b-30 header-title">Filtros</h4>
                <form method="GET">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nome">Nome ou email:</label>
                                <input type="text" class="form-control" name="nome"
                                       placeholder="Digite para iniciar uma busca"
                                       value="{{ $request->get('nome') }}">
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="{{ route(Route::currentRouteName()) }}" class="btn btn-danger waves-effect waves-light m-l-10">Limpar</a>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <a href="#custom-modal" class="btn btn-custom waves-effect waves-light mb-4" data-animation="fadein" data-plugin="custommodal"
               data-overlaySpeed="200" data-overlayColor="#36404a"><i class="mdi mdi-plus"></i> Adicionar usuário</a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">

                <div class="table-rep-plugin">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th data-priority="1">ID</th>
                                <th data-priority="1">Nome</th>
                                <th data-priority="1">Email</th>
                                <th data-priority="1">Função</th>
                                <th>Acões</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $usuarios as $model )
                                <tr>
                                    <td>{{ $model->id }}</td>
                                    <td>{{ $model->name }}</td>
                                    <td>{{ $model->email }}</td>
                                    <td>
                                        @if($model->roles->count())
                                            {{ strtoupper($model->roles->implode('name',', ')) }}
                                        @else
                                            {{ '-' }}
                                        @endif
                                    </td>
                                    <td>
                                        <form method="post"
                                              action="{{ route('usuarios.destroy', [$model->id]) }}">
                                            <a href="#custom-modal-edit-{{$model->id}}" class="btn btn-info btn-sm waves-light waves-effect" data-animation="fadein" data-plugin="custommodal"
                                               data-overlaySpeed="200" data-overlayColor="#36404a">Editar
                                            </a>
                                            {{ method_field("DELETE") }}
                                            {{ csrf_field() }}
                                            <button
                                                    onclick="javascript:return confirm('Tem certeza que deseja excluir este usuário?')"
                                                    class="btn btn-danger btn-sm waves-light waves-effect">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{ $usuarios->appends(Request::except('page'))->render() }}

                Exibindo {{ $usuarios->firstItem() }} a {{ $usuarios->lastItem() }}
                do total de {{$usuarios->total()}} registros

            </div>
        </div>
    </div>

@endsection

@section('modais')

    <!-- NOVO USUÁRIO -->
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>
        <h4 class="custom-modal-title">Adicionar usuário</h4>
        <div class="custom-modal-text text-left">
            <form role="form" method="post" action="{{route('usuarios.store')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="funcao">Função</label>
                    <select class="selectpicker form-control" name="funcao">
                        <option value="">Nenhuma</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{ strtoupper($role->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control"  name="nome" placeholder="Digite o nome" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control"  name="email" placeholder="Digite o email" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control"  name="senha" placeholder="Digite a senha" required>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- FIM NOVO USUÁRIO -->

    <!-- EDIÇÃO -->
    @foreach($usuarios as $model)
        <div id="custom-modal-edit-{{$model->id}}" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.close();">
                <span>&times;</span><span class="sr-only">Fechar</span>
            </button>
            <h4 class="custom-modal-title">Editar usuário</h4>
            <div class="custom-modal-text text-left">
                <form role="form" method="post" action="{{route('usuarios.update', $model->id)}}">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="funcao">Função</label>
                        <select class="selectpicker form-control" name="funcao"
                                >
                            <option value="">Nenhuma</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" {{$model->hasRole($role->name) ? "selected" : "" }}>
                                    {{ strtoupper($role->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control"  name="nome" placeholder="Digite o nome" required
                        value="{{$model->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control"  name="email" placeholder="Digite o email" required
                        value="{{$model->email}}">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control"  name="senha" placeholder="Digite a senha">
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    <!-- FIM EDIÇÃO -->

@endsection

@section('footer')

    <!-- responsive-table-->
    <script src="{{ asset('gestor/js/rwd-table.min.js') }}" type="text/javascript"></script>
    <!-- Modal-Effect -->
    <script src="{{ asset('gestor/js/custombox.min.js') }}"></script>
    <script src="{{ asset('gestor/js/legacy.min.js') }}"></script>

    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                focusBtnIcon: 'mdi mdi-crosshairs-gps',
                i18n: {
                    focus     : "Focar",
                    display   : "Exibir",
                    displayAll: "Exibir tudo"
                }
            });
        });
    </script>
    
@endsection
