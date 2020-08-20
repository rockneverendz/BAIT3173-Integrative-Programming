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

            <img src="{{ Storage::url($meal->image) }}" class="d-block img-fluid mb-3 mx-auto rounded">

            <div class="bg-light card mb-3 text-center">
                <div class="card-header h2">
                    {{ $meal->name }}
                </div>
                <div class="card-body">
                    {{ $meal->description }}
                </div>
                <div class="card-footer">
                    RM {{ $meal->price }}
                </div>
            </div>

            <div class="bg-light card mb-3 text-center">
                <div class="card-body justify-content-end row">
                    <form method="POST" action="{{ route('user.cart.add') }}">
                        @csrf
                        <input id="id" type="hidden" name="id" value="{{ $meal->id }}">
                        <label for="quantity" class="my-auto text-md-right">{{ __('Quantity : ') }}</label>
                        <input id="quantity" type="number" min="1" max="100" value="{{ old('quantity', 1) }}" class="d-inline form-control w-auto mx-3 @error('quantity') is-invalid @enderror" name="quantity">
                        <button type="submit" class="btn btn-primary w-auto mx-3">
                            {{ __('Add to Cart') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
