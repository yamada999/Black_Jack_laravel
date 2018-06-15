@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
<h1 id="mainTitle">Black Jack</h1>
<div id="login">
    <button type="button" class="btn btn-primary" onclick="location.href='{{ route('game') }}'">{{ __('GAME START') }}</button>
</div>
@endsection
