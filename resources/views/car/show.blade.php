@extends('layouts.template')

@section('content')
<div class="container">
    <span></span>
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6">
            <div class="shadow-lg rounded">
                <img src="{{ asset('storage/uploads/' . $product->photo) }}" class="img-fluid rounded" alt="{{ $product->name }}" style="width: 100%; height: 320px; object-fit: cover; border-radius: 8px;">
            </div>
        </div>
        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->name }}</h1>
            <h4 class="text-muted mb-4">Category: <span class="text-primary">{{ $product->category->name }}</span></h4>

            <div class="d-flex align-items-center mb-4">
                <span class="fw-bold text-success h3">${{ number_format($product->price,  0, ',', '.') }}</span>
            </div>
            <div class="d-flex align-items-center mb-4">
                <span class="fw-bold text-success ">Plat:{{ $product->plat->plat }}</span>
            </div>
            <p class="mb-4">Stock: <span class="text-warning">{{ $product->stock }} units</span></p>
            <div class="d-flex gap-3">
                <button class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Add to Cart</button>
                <button class="btn btn-outline-primary px-4 py-2 rounded-pill shadow-sm">Buy Now</button>
            </div>
        </div>
    </div>

    <!-- Product Description Section -->
    <div class="row justify-content-center my-5">
        <div class="col-md-8 text-center">
            <p class="mb-4">
                <strong class="h4">Description:</strong>
                <br>
                <span>{{ $product->description }}</span>
            </p>
        </div>
    </div>

    <!-- Related Products Section -->
    <div class="row ">
        <h3 class="mb-4">Related Products</h3>
        @foreach ($otherProducts as $item)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-lg rounded">
                    <img src="{{ asset('storage/uploads/' . $item->photo) }}" class="card-img-top rounded" alt="{{ $item->name }}" style="height: 180px; object-fit: cover; border-radius: 8px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="mb-1">Price: ${{ number_format($item->price, 0, ',', '.') }}</p>
                        <p class="text-muted">Stock: {{ $item->stock }} units</p>
                        <a href="{{ route('car.show', $item->id) }}" class="btn btn-outline-secondary rounded-pill">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
