@extends('layouts.staff.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Availability</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meals as $meal)
                    <tr>
                        <th scope="row">{{ $meal->name }}</th>
                        <td>{{ $meal->description }}</td>
                        <td>{{ $meal->price }}</td>
                        <td>{{ $meal->availability == 1 ? 'Available' : 'Unavailable' }}</td>
                        <td><a href="{{ route('staff.meal.retrive.submit', ['id' => $meal->id], false) }}">{{ __('Details') }}</a></td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $meals->links() }}
        </div>
    </div>
</div>
@endsection
