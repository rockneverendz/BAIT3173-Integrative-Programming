@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row row-cols-1 row-cols-md-2">
            @forelse ($stalls as $stall)

                <div class="col mb-4">
                    <a href="{{ route('user.stall.retrive', ['stall_id' => $stall->id], false) }}" class="text-decoration-none text-dark">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-0">{{ $stall->name }}</h5>
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
