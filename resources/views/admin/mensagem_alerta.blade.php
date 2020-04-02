@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{$error}}
                </div>
            </div>
        </div>
    @endforeach
@endif

@if ( $mensagem = session('message') )
    <div class="row">
        <div class="col-12">
            <div class="alert alert-{{ $mensagem['tipo'] }} alert-dismissible bg-{{ $mensagem['tipo'] }} text-white border-0 fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ $mensagem['mensagem'] }}
            </div>
        </div>
    </div>
@endif
