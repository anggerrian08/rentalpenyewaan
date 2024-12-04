@extends('layouts.template')

@section('content')
<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Management Mobil</h4><br>
                    <div class="row align-items-center">
                        <!-- New Product Button -->
                        <div class="col-lg-3 col-xl-2">
                            <a href="{{ route('car.create') }}" class="btn btn-primary mb-3 mb-lg-0">
                                <i class='bi bi-plus-circle me-1'></i> New Product
                            </a>
                        </div>
                        <!-- Search and Filter Form -->
                        <div class="col-lg-9 col-xl-10">
                            <form action="{{ route('car.index') }}" method="GET" class="float-lg-end">
                                <div class="input-group mb-2">
                                    <input type="text" name="input" class="form-control" placeholder="Search car..."
                                        value="{{ request('input') }}">
                                    <!-- Search Button -->
                                    <button type="submit" class="btn btn-outline-secondary bg-warning">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                            <form action="{{ route('car.filter') }}" method="GET" class="float-lg-end">
                                <div class="input-group mb-2">
                                    <!-- Start Price -->
                                    <input type="number" name="start_price" class="form-control" placeholder="Start Price"
                                        value="{{ request('start_price') }}" min="0">
                                    <!-- End Price -->
                                    <input type="number" name="end_price" class="form-control" placeholder="End Price"
                                        value="{{ request('end_price') }}" min="0">
                                    <!-- Search -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 product-grid">
        @forelse ($data as $item)
            <div class="col">
                <div class="card position-relative">
                    <!-- Icons for Edit and Delete -->
                    <div class="position-absolute top-0 start-0 m-2">
                        @if (auth()->user()->hasRole('admin'))
                            <a href="{{ route('car.edit', $item->id) }}" class="btn btn-sm btn-warning me-1"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('car.destroy', $item->id) }}" method="POST"
                                class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger btn-delete"
                                    data-id="{{ $item->id }}"><i class="bi bi-trash"></i></button>
                            </form>
                        @else
                            <button data-bs-target="#add_ulasan{{ $item->id }}" data-bs-toggle="modal"
                                class="btn btn-sm btn-warning me-1">
                                <i class="bx bx-edit"></i>
                            </button>
                        @endif

                    </div>
                    <!-- Product Image -->
                    <img src="{{ asset('storage/uploads/' . $item->photo) }}" class="card-img-top img-fluid"
                        alt="{{ $item->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="card-title">{{ $item->name }}</h6>
                        <div class="clearfix">
                            <p class="mb-0 float-start">Stock: {{ $item->stock }}</p>
                            <p class="mb-0 float-end fw-bold text-success">${{ number_format($item->price, 0, ',', '.') }}
                            </p>
                        </div>
                        <a href="{{ route('car.show', $item->id) }}" class="btn btn-primary w-100 mt-3">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center" role="alert">
                    No products found.
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-4">
        {{ $data->links() }}
    </div>

    {{-- give review --}}
    @foreach ($data as $item)
        <div class="modal fade" id="add_ulasan{{ $item->id }}" tabindex="-1" aria-labelledby="addUlasanLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="addUlasanLabel"><i class="bx bx-comment"></i> Add Review</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Product Information -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">{{ $item->name }}</h6>
                            <p class="text-muted">Stock: {{ $item->stock }} | Price:
                                ${{ number_format($item->price, 0, ',', '.') }}</p>
                        </div>

                        <!-- Review Text -->
                        <form action="{{ route('review.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="car_id" value="{{ $item->id }}">
                            <div class="mb-3">
                                <label for="ulasan" class="form-label fw-bold">Your Review</label>
                                <textarea class="form-control" id="ulasan" name="review" rows="5" placeholder="Write your review here..."
                                    required></textarea>
                            </div>

                            <!-- Rating -->
                            <div class="mb-3">
                                <label for="rating" class="form-label fw-bold">Rating</label>
                                <select class="form-select" id="rating" name="rating" required>
                                    <option value="" selected disabled>Select Rating</option>
                                    <option value="1">1 - Poor</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="3">3 - Good</option>
                                    <option value="4">4 - Very Good</option>
                                    <option value="5">5 - Excellent</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-send"></i> Submit
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
