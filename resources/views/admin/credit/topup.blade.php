@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ __('Top Up') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('admin.credit.topup') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="user_id_card" class="col-md-4 col-form-label text-md-right">{{ __('User ID') }}</label>

                            <div class="col-md-6">
                                <input id="user_id_card" type="text" class="form-control @error('user_id_card') is-invalid @enderror" name="user_id_card" value="{{ old('user_id_card') }}" required autofocus>

                                @error('user_id_card')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" min="1" max="1000" step="0.01" value="1.00" class="form-control @error('amount') is-invalid @enderror" name="amount" required>

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Top Up') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="alert-heading mb-3">Receipt</h4>
                <p>Amount before : {{ session('status.before') }}</p>
                <p>Top up amount : {{ session('status.amount') }}</p>
                <hr>
                <p class="mb-0">Amount after : {{ session('status.after') }}</p>
            </div>        
            @endif
        </div>
    </div>
</div>
@endsection
