@extends('template.index')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <!-- New Product Button -->
                        <div class="col-lg-3 col-xl-2">
                            <a href="{{ route('car.create') }}" class="btn btn-primary mb-3 mb-lg-0">
                                <i class='bx bxs-plus-square'></i> New Product
                            </a>
                        </div>

                        <!-- Search and Filter Form -->
                        <div class="col-lg-9 col-xl-10">
                            <form action="{{ route('car.index') }}" method="GET" class="float-lg-end">
                                <div class="input-group">
                                    <input type="text" name="input" class="form-control" placeholder="Search car..." value="{{ request('input') }}">
                                    <!-- Search Button -->
                                    <button type="submit" class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-search"></i>
                                    </button>
                                </div>
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
                        <a href="{{ route('car.edit', $item->id) }}" class="btn btn-sm btn-warning me-1"><i class="bx bx-edit"></i></a>
                        <form action="{{ route('car.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            
                            <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="{{ $item->id }}"><i class="bx bx-trash"></i></button>
                        </form>
                        
                    </div>
                    <!-- Product Image -->
                    <img src="{{ asset('storage/uploads/' . $item->photo) }}" class="card-img-top img-fluid" alt="{{ $item->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="card-title">{{ $item->name }}</h6>
                        <div class="clearfix">
                            <p class="mb-0 float-start">Stock: {{ $item->stock }}</p>
                            <p class="mb-0 float-end fw-bold text-success">${{ number_format($item->price,  0, ',', '.') }}</p>
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
    
    
@endsection
