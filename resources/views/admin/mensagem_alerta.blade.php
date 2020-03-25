@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="help-block text-danger font-16">{{$error}}</li>
        @endforeach
    </ul>
@endif

@if ( $mensagem = session('message') )
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30 text-white bg-{{ $mensagem['tipo'] }}">
                <div class="card-body">
                    <b>{{ $mensagem['mensagem'] }}</b>
                </div>
            </div>
        </div>
    </div>
@endif
