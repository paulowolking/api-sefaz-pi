@extends('admin.template')
@section('conteudo')
    <div class="card-box">
        <h4 class="m-t-0 m-b-30 header-title">Filtros</h4>
        <form method="GET">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                               placeholder="Digite um nome para busca"
                               value="{{ $request->get('nome') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">&nbsp;</label><br>
                        <button class="btn btn-success waves-light waves-effect">Buscar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="card-box">

        <div class="text-right">
            {{--            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="modal"--}}
            {{--                    data-target="#form-modal-prospeccao-sem-campanha">--}}
            {{--                <i class="fa fa-fw fa-plus-circle"></i>Prospecção--}}
            {{--            </button>--}}

            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                    data-target="#form-modal">Novo usuário
            </button>
        </div>
        <h4 class="m-t-0 m-b-30 header-title">Usuários Cadastrados</h4>

        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Permissão</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $usuarios as $model )
                    <tr>
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->name }}</td>
                        <td>{{ $model->email }}</td>
                        <td>{{$model->roles()->first() ? $model->roles()->first()->name : "--"}}</td>
                        <td>
                            <form method="post"
                                  action="{{ route('usuarios.destroy', [$model->id]) }}">
                                <button type="button" class="btn btn-info btn-sm waves-light waves-effect"
                                        data-toggle="modal"
                                        data-target="#form-modal-edit-{{$model->id}}">
                                    Editar
                                </button>
                                {{ method_field("DELETE") }}
                                {{ csrf_field() }}
                                <button
                                    onclick="javascript:return confirm('Tem certeza que deseja excluir este usuário?')"
                                    class="btn btn-danger btn-sm waves-light waves-effect">
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $usuarios->links() }}

@endsection

@section('modais')

    <!-- NOVO USUÁRIO -->
    <div id="form-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body"><h4 class="text-uppercase text-center m-b-30">Novo Usuário</h4>
                    <form class="form-horizontal" method="post"
                          action="{{route('usuarios.store')}}">
                        {{ csrf_field() }}
                        <div class="form-group m-b-25">
                            <div class="col-12"><label for="permissao">Permissão</label>
                                <select class="selectpicker form-control" name="permissao"
                                        id="role_id">
                                    @foreach($roles as $model)
                                        <option value="{{$model->id}}">{{$model->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-b-25">
                            <div class="col-12"><label for="username">Nome</label>
                                <input class="form-control"
                                       id="nome"
                                       required=""
                                       name="nome"
                                       placeholder="Digite o nome">
                            </div>
                        </div>
                        <div class="form-group m-b-25">
                            <div class="col-12"><label for="username">Email</label>
                                <input class="form-control"
                                       type="email" id="email"
                                       required=""
                                       name="email"
                                       placeholder="Digite o email">
                            </div>
                        </div>
                        <div class="form-group m-b-25">
                            <div class="col-12"><label for="username">Telefone</label>
                                <input class="form-control celular"
                                       id="telefone"
                                       required=""
                                       name="telefone"
                                       placeholder="Digite o telefone">
                            </div>
                        </div>

                        <div class="form-group m-b-25">
                            <div class="col-12"><label for="username">Senha</label>
                                <input class="form-control"
                                       type="password"
                                       id="password"
                                       name="password"
                                       required=""
                                       placeholder="Senha">
                            </div>
                        </div>

                        <div class="form-group account-btn text-center m-t-10">
                            <div class="col-12">
                                <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content --></div><!-- /.modal-dialog --></div>


    <!-- FIM NOVO USUÁRIO -->

    <!-- EDIÇÃO -->
    @foreach($usuarios as $model)
        <div id="form-modal-edit-{{$model->id}}" class="modal fade" tabindex="-1" role="dialog"
             aria-labelledby="custom-width-modalLabel"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body"><h4 class="text-uppercase text-center m-b-30">Novo Usuário</h4>
                        <form class="form-horizontal" method="post"
                              action="{{route('usuarios.update', $model->id)}}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group m-b-25">
                                <div class="col-12"><label for="role">Permissão</label>
                                    <select class="selectpicker form-control" name="permissao"
                                            id="role_id">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}"
                                                {{$model->hasRole($role->name) ? "selected" : "" }}>
                                                {{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-b-25">
                                <div class="col-12"><label for="username">Nome</label>
                                    <input class="form-control"
                                           id="nome"
                                           required=""
                                           name="nome"
                                           value="{{$model->name}}"
                                           placeholder="Digite o nome">
                                </div>
                            </div>
                            <div class="form-group m-b-25">
                                <div class="col-12"><label for="username">Email</label>
                                    <input class="form-control"
                                           type="email" id="email"
                                           required=""
                                           name="email"
                                           value="{{$model->email}}"
                                           placeholder="Digite o email">
                                </div>
                            </div>

                            <div class="form-group m-b-25">
                                <div class="col-12"><label for="username">Senha</label>
                                    <input class="form-control"
                                           type="password"
                                           id="password"
                                           name="password"
                                           placeholder="Senha">
                                </div>
                            </div>

                            <div class="form-group account-btn text-center m-t-10">
                                <div class="col-12">
                                    <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light">
                                        Salvar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content --></div><!-- /.modal-dialog --></div>
    @endforeach

    <!-- FIM EDIÇÃO -->

@endsection
