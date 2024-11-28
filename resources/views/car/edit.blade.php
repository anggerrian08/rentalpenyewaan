@extends('template')

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3 text-primary">RentalMobil</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="javascript:;" class="text-decoration-none text-dark"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="card shadow-sm">
    <div class="card-body p-4">
        <h5 class="card-title text-secondary"><i class="bx bx-add-to-queue me-2"></i>Add New Product</h5>
        <hr class="text-secondary" />
        <div class="form-body mt-4">
            <form action="{{ route('car.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product Title -->
                <div class="mb-3">
                    <label for="inputProductTitle" class="form-label fw-bold">Product Title</label>
                    <input type="text" class="form-control" id="inputProductTitle" name="name" value="{{ old('name', $data->name) }}" placeholder="Enter product title">
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="inputProductDescription" class="form-label fw-bold">Description</label>
                    <textarea class="form-control" id="inputProductDescription" rows="3" name="description">{{ old('description', $data->description) }}</textarea>
                </div>

                <!-- Price and Stock -->
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputPrice" class="form-label fw-bold">Price</label>
                        <input type="number" class="form-control" id="inputPrice" name="price" value="{{ old('price', $data->price) }}" min="0">
                    </div>
                    <div class="col-md-6">
                        <label for="inputStock" class="form-label fw-bold">Stock</label>
                        <input type="number" class="form-control" id="inputStock" name="stock" value="{{ old('stock', $data->stock) }}" min="0">
                    </div>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label for="inputProductType" class="form-label fw-bold">Product Type</label>
                    <select name="category_id" class="form-select" id="inputProductType">
                        @foreach($data_category as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $data->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Plat -->
                <div class="mb-3">
                    <label for="inputVendor" class="form-label fw-bold">Plat</label>
                    <select name="plat_id" class="form-select" id="inputVendor">
                        @foreach($data_plat as $plat)
                            <option value="{{ $plat->id }}" {{ $plat->id == $data->plat_id ? 'selected' : '' }}>{{ $plat->plat }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Photo -->
                <div class="mb-3">
                    <label for="image-uploadify" class="form-label fw-bold">Product Images</label>
                    <input id="image-uploadify" type="file" class="form-control" name="photo">
                    @if($data->photo)
                        <img src="{{ asset('storage/uploads/' . $data->photo) }}" alt="Product Image" class="mt-3" style="width: 200px; height: auto;">
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
