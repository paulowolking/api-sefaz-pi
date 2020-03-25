@extends('layouts.app')

@section('header')
@endsection

@section('content')

    @php
        $i = 1;
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert alert-danger card" style="margin-top: 50px; text-align: center">
                    <div class="card-header">
                        <h3>A página solicitada é restrita.</h3>
                    </div>
                    <div class="card-body">
                        Você não possui acesso a página que foi solicitada
                        <hr>
                        <small>Se você acha que esta mensagem é um erro, entre em contato com o administrador do sistema.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    </script>
@endsection
