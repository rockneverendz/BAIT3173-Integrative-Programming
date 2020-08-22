@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            <div class="card">
                <div class="card-header">{{ __('Customer Dashboard') }}</div>

                <div class="card-body">
                    <p>
                        <a href="{{ route('user.stall.list') }}">{{ __('Stall List') }}</a>
                    </p>
                    <p>
                        <a href="{{ route('user.meal.xml') }}">Meal List</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
