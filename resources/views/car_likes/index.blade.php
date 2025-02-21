@extends('layouts.template')

@section('content')
    <style>
        .kotak-biru {
            border-radius: 10px;
            background: linear-gradient(90deg, #15B9FF 33.4%, #0D6EFD 100%);
            padding: 20px;
            margin: 10px;
            max-height: 85px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .like-icon {
            color: red;
            margin-right: 5px;
        }
    </style>
    <br>
    <!-- Card 1: Kotak Biru -->
    <div class="kotak-biru">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
                <h2 class="text-white fw-bold mb-1">Mobil Favorit</h2>
                <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Mobil Favorit</p>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($data as $like)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($like->car->photo)
                        <img src="{{ asset('storage/uploads/car/' . $like->car->photo) }}" class="card-img-top"
                            alt="{{ $like->car->name }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/default-car.jpg') }}" class="card-img-top" alt="Default Image"
                            style="height: 200px; object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $like->car->name }}</h5>
                        <p class="card-text text-muted">Harga: Rp.{{ number_format($like->car->price, 2) }}</p>

                        <p class="card-text">
                            <i class="fas fa-heart like-icon"></i><strong>{{ $likes[$like->car_id] ?? 0 }} Suka</strong>
                        </p>

                        @if (auth()->user()->hasRole('user'))
                            <form action="{{ route('car_likes.destroy', $like->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Tidak Suka</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if ($data->isEmpty())
        <div class="text-center" style="margin-top: 70px;">
            <img src="{{ asset('assets/images/logo/notdata.png') }}" width="200px" alt="">
        </div>
    @endif
@endsection
