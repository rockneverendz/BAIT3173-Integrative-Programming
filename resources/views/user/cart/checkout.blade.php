@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <table class="table table-hover border">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $credit = Auth::user()->credit;
                        $total = 0.00;
                    @endphp
                    @foreach ($cart as $id => $item)
                        @php
                            $name = $item[0]['name'];
                            $price = $item[0]['price'];
                            $quantity = $item[0]['quantity'];
                            $subtotal = $price * $quantity;
                            $total += $subtotal
                        @endphp
                        <tr>
                            <td scope="row">{{ $name }}</td>
                            <td>RM {{ $price }}</td>
                            <td>{{ $quantity }}</td>
                            <td>RM {{ $subtotal }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                        <td>RM {{ $total }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="card mb-3">
                <div class="card-header">{{ __('Checkout') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.cart.add') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Account Balance</label>

                            <div class="col-md-6">
                                <input id="name" class="form-control-plaintext" value="RM {{ $credit }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Order Total</label>

                            <div class="col-md-6">
                                <input id="price" class="form-control-plaintext" value="RM {{ $total }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">New Balance</label>

                            <div class="col-md-6">
                                <input id="price" class="form-control-plaintext" value="RM {{ $credit-$total }}">

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Continue
                                </button>
                            </div>
                        </div>
                    <form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
