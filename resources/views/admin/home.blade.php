@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                        {{ __('You are logged in!') }}
                    </p>
                    <p>
                        <a href="{{ route('admin.credit.topup') }}">{{ __('Top Up') }}</a>
                    </p>
                    <p>
                        <a href="{{ route('admin.credit.xml') }}">Top Up XML</a>
                    </p>
                    <p>
                        <a href="{{ route('admin.order.xml') }}">Orders XML</a>
                    </p>
                    <p>
                        <a href="{{ route('admin.meal.list') }}">{{ __('Meal List') }}</a>
                    </p>
                    <p>
                        <a href="{{ route('admin.meal.create') }}">New Meal</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
