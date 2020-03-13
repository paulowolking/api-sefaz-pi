@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Failed verification') }}</div>

                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        {{ __('Your email could not be verified.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
