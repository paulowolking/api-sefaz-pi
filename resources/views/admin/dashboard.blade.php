@extends('admin.template')
@section('titulo-corpo','Dashboard')

@section('conteudo')

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title mb-4">Login Sefaz</h4>

                <form method="post"
                      action="{{route('dashboard.user.sefaz')}}">
                    {{ csrf_field() }}
                    <div class="row col-6">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user">Usuario:</label>
                                <input type="text" class="form-control" id="user" name="user"
                                       value="{{$request->user()->user_sefaz ?? ''}}"
                                       placeholder="Usuário">
                                {!! $errors->first('user','<span class="help-block text-danger"><small>:message</small></span>')!!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       value="{{$request->user()->password_sefaz ?? ''}}"
                                       placeholder="Senha">
                                {!! $errors->first('passwordpassword','<span class="help-block text-danger"><small>:message</small></span>')!!}
                            </div>
                        </div>

                        <div class="col-12 text-right">
                            <button class="btn btn-success waves-light waves-effect">Salvar</button>
                        </div>
                    </div>
                </form>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

    @if($request->user()->user_sefaz and $request->user()->password_sefaz)
        <div class="row">
            <div class="col-xl-6">
                <div class="card-box">
                    <h4 class="header-title">Buscar clientes</h4>
                    <form method="post"
                          action="{{route('dashboard.cliente')}}">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nome">CNPJ:</label>
                                <input type="text" class="form-control cnpj" id="cnpj" name="cnpj"
                                       value="{{$request->get('cnpj') ?? ''}}"
                                       placeholder="CNPJ">
                                {!! $errors->first('cnpj','<span class="help-block text-danger"><small>:message</small></span>')!!}
                            </div>
                        </div>

                        <div class="col-12 text-right">
                            <button class="btn btn-success waves-light waves-effect">Buscar</button>
                        </div>
                        <hr>
                    </form>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-3">Resultado</h4>
                                    <div class="panel-body">
                                        <div class="text-left text-muted font-13">
                                            <h4 class="mb-2"><strong>CPF/CNPJ :</strong>
                                                <span>{{$data['cpfCnpj'] ?? ''}}</span></h4>
                                            <h4 class="mb-2"><strong>Nome Fantasia :</strong>
                                                <span>{{$data['nomeFantasia'] ?? ''}}</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card-box">
                    <h4 class="header-title">Buscar Pagamentos</h4>
                    <form method="post"
                          action="{{route('dashboard.pagamento')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nome">CPF/CNPJ:</label>
                                    <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj"
                                           value="{{$request->get('cpf_cnpj') ?? ''}}"
                                           placeholder="CPF/CNPJ">
                                    {!! $errors->first('cpf_cnpj','<span class="help-block text-danger"><small>:message</small></span>')!!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start-date">Data Início:</label>
                                    <input type="text" class="form-control data-sefaz" id="start-date" name="start-date"
                                           value="{{$request->get('start-date') ?? ''}}"
                                           placeholder="yyyy/mm">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end-date">Data Fim:</label>
                                    <input type="text" class="form-control data-sefaz" id="end-date"
                                           value="{{$request->get('end-date') ?? ''}}"
                                           name="end-date"
                                           placeholder="yyyy/mm">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-right">
                            <button class="btn btn-success waves-light waves-effect">Buscar</button>
                        </div>
                        <hr>
                    </form>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th data-priority="1">Data Início</th>
                                                <th data-priority="1">Data Fim</th>
                                                <th data-priority="1">Valor</th>
                                                <th data-priority="1">Quantidade</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($list))
                                                @foreach( $list as $item )
                                                    <tr>
                                                        <td>{{ $item['dataInicio'] }}</td>
                                                        <td>{{ $item['dataFim'] }}</td>
                                                        <td>R$ {{ number_format($item['valor'], 2, ',', '.')  }}</td>
                                                        <td>{{ $item['quantidade'] }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end row -->
    @endif
@endsection
