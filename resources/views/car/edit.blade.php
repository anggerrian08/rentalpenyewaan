@extends('layouts.template')

@section('content') <br>
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <h1 class="my-4">Edit Car</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('car.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="merek_id" class="form-label">Brand</label>
            <select name="merek_id" id="merek_id" class="form-control">
                <option value="" disabled>Select brand</option>
                @foreach ($data_merek as $brand)
                    <option value="{{ $brand->id }}" {{ $car->merek_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Car Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $car->name) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $car->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="type_transmisi" class="form-label">Transmission Type</label>
            <select name="type_transmisi" id="type_transmisi" class="form-control">
                <option value="" disabled>-- Select --</option>
                @foreach (['Transmisi Manual', 'Otomatis Konvensional', 'Otomatis CVT', 'DCT', 'AMT'] as $type)
                    <option value="{{ $type }}" {{ old('type_transmisi', $car->type_transmisi) == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fuel_type" class="form-label">Fuel Type</label>
            <select name="fuel_type" id="fuel_type" class="form-control">
                <option value="">-- Select --</option>
                @foreach (['bensin', 'solar', 'bio solar', 'cng', 'kendaraan listrik'] as $fuel)
                    <option value="{{ $fuel }}" {{ old('fuel_type', $car->fuel_type) == $fuel ? 'selected' : '' }}>{{ $fuel }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="manufacture_year" class="form-label">Manufacture Year</label>
            <input type="date" name="manufacture_year" id="manufacture_year" class="form-control" value="{{ old('manufacture_year', $car->manufacture_year) }}">
        </div>

        <div class="mb-3">
            <label for="plat" class="form-label">Plat</label>
            <input type="text" name="plat" id="plat" class="form-control" value="{{ old('plat', $car->plat) }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $car->price) }}">
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $car->stock) }}">
        </div>

        <div class="mb-3">
            <label for="best_choice" class="form-label">Best Choice</label>
            <select name="best_choice" id="best_choice" class="form-control">
                <option value="">-- Select --</option>
                <option value="1" {{ old('best_choice', $car->best_choice) == '1' ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ old('best_choice', $car->best_choice) == '2' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="passenger_capacity" class="form-label">Passenger Capacity</label>
            <input type="number" name="passenger_capacity" id="passenger_capacity" class="form-control" value="{{ old('passenger_capacity', $car->passenger_capacity) }}">
        </div>

        <div class="mb-3">
            <label for="luggage_capacity" class="form-label">Luggage Capacity</label>
            <input type="number" name="luggage_capacity" id="luggage_capacity" class="form-control" value="{{ old('luggage_capacity', $car->luggage_capacity) }}">
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
            <small>Leave blank if you don't want to update the photo</small><br>
            <img src="{{asset('storage/uploads/car/'. $car->photo)}}" alt="" height="100px">
        </div>

        <button type="submit" class="btn btn-success">Update Car</button>
    </form>
</div>
@endsection
