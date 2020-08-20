@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="accordion mb-3" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <div class="mb-0">
                            <button class="btn btn-link p-0 border-0 bg-transparent stretched-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{ $stall->name }}
                            </button>
                        </div>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            {{ $stall->description }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2">
            @forelse ($meals as $meal)

                <div class="col mb-4">
                    <a href="{{ route('user.meal.retrive', ['meal_id' => $meal->id], false) }}" class="text-decoration-none text-dark">
                        <div class="card h-100">
                            <img src="{{ Storage::url($meal->image) }}" alt="Image of {{ $meal->name }}" class="bg-light card-img-top flex-fill" style="object-fit: contain;">
                            <div class="align-items-end card-body d-flex flex-grow-0">
                                <h5 class="card-title m-0">{{ $meal->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            
            @empty
            
                <p>Menu unavailable</p>
            
            @endforelse
            </div>
        </div>
    </div>    
</div>

@endsection
