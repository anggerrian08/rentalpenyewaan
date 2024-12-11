@extends('layouts.template')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Car Likes</h1>

    <div class="row">
        @foreach($data as $like)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if($like->car->photo)
                <img src="{{ asset('storage/uploads/car/' . $like->car->photo) }}" 
                     class="card-img-top" 
                     alt="{{ $like->car->name }}" 
                     style="height: 200px; object-fit: cover;">
                @else
                <img src="{{ asset('images/default-car.jpg') }}" 
                     class="card-img-top" 
                     alt="Default Image" 
                     style="height: 200px; object-fit: cover;">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $like->car->name }}</h5>
                    <p class="card-text text-muted">Price: ${{ number_format($like->car->price, 2) }}</p>

                    <p class="card-text">
                        <strong>{{ $likes[$like->car_id] ?? 0 }} Likes</strong>
                    </p>

                    @if(auth()->user()->hasRole('user'))
                        <form action="{{ route('car_likes.destroy', $like->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Unlike</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($data->isEmpty())
        <div class="alert alert-info text-center">No likes found.</div>
    @endif
</div>
@endsection
