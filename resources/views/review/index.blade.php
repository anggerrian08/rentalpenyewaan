@extends('layouts.template')

@section('content')
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-xl-2">
                            @if (auth()->user()->usertype != 'admin')
                                <h5 class="fw-bold">Halaman Ulasan Anda</h5>
                            @else
                                <h5 class="fw-bold">Halaman ini mengulas pengguna</h5>
                            @endif
                        </div>
                        <div class="col-lg-9 col-xl-10">
                            <!-- Optional: Add search bar or additional controls here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid mt-3">
        @foreach ($data_ulasan as $item)
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('storage/uploads/car/' . $item->car->photo) }}" class="card-img-top" alt="Car Image"
                        style="width: 100%; height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="card-title text-primary fw-bold">Judul: {{ $item->car->name }}</h6>
                        <p class="text-muted">Rating yang diberikan oleh <br> <strong>{{ $item->user->email }}</strong> :
                        </p>
                        <div>
                            @for ($i = 1; $i <= $item->rating; $i++)
                                <i class="fas fa-star text-warning"></i>
                            @endfor
                            @for ($i = $item->rating + 1; $i <= 5; $i++)
                                <i class="far fa-star text-warning"></i>
                            @endfor
                            <span class="ms-2">: {{ $item->rating }}</span>
                        </div>
                        <div class="d-flex align-items-center mt-3 justify-content-between">

                            <button class="btn btn-secondary btn-sm" data-bs-target="#show{{ $item->id }}"
                                data-bs-toggle="modal" type="button"> <i
                                    class="fa-solid fa-info-circle me-1"></i>detail</button>
                            @if (auth()->user()->hasRole('user'))
                                <button type="button" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}"
                                    class="btn btn-success btn-sm" title="Edit">
                                    <i class="fa-solid fa-edit me-1"></i> Edit
                                </button>
                                <form action="{{ route('review.destroy', $item->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end mt-4">
        {{ $data_ulasan->links() }}
    </div>
    <!-- Modal Edit -->
    @foreach ($data_ulasan as $item)
        <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1"
            aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Tinjauan -
                            {{ $item->car->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('review.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="review{{ $item->id }}" class="form-label">Tinjauan</label>
                                <textarea name="review" id="review{{ $item->id }}" class="form-control" rows="3">{{ $item->review }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="rating{{ $item->id }}" class="form-label">Berikan Penilaian</label>
                                <select name="rating" id="rating{{ $item->id }}" class="form-select">
                                    <option value="" disabled>Pilih Rating</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ $i == $item->rating ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="fa-solid fa-times me-1"></i> Batal
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-save me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- modal show --}}
    @foreach ($data_ulasan as $item)
        <div class="modal fade" id="show{{ $item->id }}" tabindex="-1"
            aria-labelledby="showModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" aria-modal="true">
                <div class="modal-content rounded-3 shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="showModalLabel{{ $item->id }}">Detail Tinjauan -
                            {{ $item->car->name }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-3">
                            <img src="{{ asset('storage/uploads/' . $item->car->photo) }}" alt="{{ $item->car->name }}"
                                class="img-fluid rounded">
                        </div>
                        <p class="fw-bold">Peninjau:</p>
                        <p>{{ $item->user->name }} ({{ $item->user->email }})</p>
                        <p class="fw-bold">Review:</p>
                        <p>{{ $item->review }}</p>
                        <p class="fw-bold">Rating:</p>
                        <div class="d-flex align-items-center">
                            @for ($i = 1; $i <= $item->rating; $i++)
                                <i class="fas fa-star text-warning" data-bs-toggle="tooltip"
                                    title="{{ $i }}"></i>
                            @endfor
                            @for ($i = $item->rating + 1; $i <= 5; $i++)
                                <i class="far fa-star text-warning" data-bs-toggle="tooltip"
                                    title="{{ $i }}"></i>
                            @endfor
                            <span class="ms-2">{{ $item->rating }}</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-times me-1"></i> Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
