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

            @if ($cart)

            <table class="table table-hover border">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0.00
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
                            <td><a href="{{ route('user.cart.delete', ['meal_id' => $id], false) }}">Remove</a></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                        <td>RM {{ $total }}</td>
                        <td><a href="#"></a></td>
                    </tr>
                </tbody>
            </table>



            <div class="bg-light card mb-3 text-center">
                <div class="card-body justify-content-end row">
                    <a class="btn btn-primary w-auto mx-3" href="{{ route('user.cart.checkout') }}" role="button">
                        Checkout
                    </a>
                </div>
            </div>

            @else

            <div class="bg-light card mb-3 text-center">
                <div class="card-body">
                    Your cart is empty!
                </div>
            </div>

            @endif
        </div>
    </div>
</div>
@endsection
