@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row row-cols-1 row-cols-md-2">
            @forelse ($meals as $meal)

                <div class="col mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image of {{ $meal->name }}">
                        <div class="card-body">
                            <h5 class="card-title m-0">{{ $meal->name }}</h5>
                        </div>
                    </div>
                </div>
            
            @empty
            
                <p>Menu unavailable</p>
            
            @endforelse
            </div>
        </div>
    </div>    
</div>

@endsection
