@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if ($orders)

                @foreach ($orders as $order)

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
                                $total = 0.00;
                                $meals = $order->meals;
                            @endphp
                            @foreach ($meals as $meal)
                                @php
                                    $name = $meal->name;
                                    $price = $meal->pivot->price_each;
                                    $quantity = $meal->pivot->quantity;
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

                @endforeach

            @else

            <div class="bg-light card mb-3 text-center">
                <div class="card-body">
                    Your order list is empty!
                </div>
            </div>

            @endif

        </div>
    </div>
</div>
@endsection
