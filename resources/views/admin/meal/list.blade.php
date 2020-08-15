@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="accordion mb-3" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <div class="mb-0">
                            <button class="btn btn-link p-0 border-0 bg-transparent stretched-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{ Auth::user()->name }}
                            </button>
                        </div>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            {{ Auth::user()->description }}
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-hover border">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Availability</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meals as $meal)
                    <tr>
                        <td scope="row">{{ $meal->name }}</td>
                        <td>{{ $meal->price }}</td>
                        <td>{{ $meal->availability == 1 ? 'Available' : 'Unavailable' }}</td>
                        <td><a href="{{ route('admin.meal.retrive', ['id' => $meal->id], false) }}">{{ __('Details') }}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $meals->links() }}
        </div>
    </div>
</div>
@endsection
