<style>
    /* Pastikan modal berada di atas card */
    /* .modal-dialog {
        margin: auto;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1050;
        /* Pastikan modal dialog memiliki z-index yang tinggi */
    /* } */

    /* .modal-backdrop {
        z-index: 1040 !important;
    }

    .modal-content {
        z-index: 1050 !important;
    } */

    .card,
    .container,
    .row {
        z-index: 1;
        /* Pastikan card berada di bawah modal */
    }

    /* .modal {
        z-index: 1050;
    } */
</style>
<!-- Modal Add Promosi -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> <!-- Menambahkan class modal-dialog-centered -->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah promosi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('promosi.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Title</label>
                        <input type="text" class="form-control" id="recipient-name" name="title">
                        @error('title')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Foto</label>
                        <input type="file" class="form-control" id="recipient-name" name="photo">
                        @error('photo')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-control">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="start_date">
                        @error('start_date')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-control">Tanggal Selesai</label>
                        <input type="date" class="form-control" name="end_date">
                        @error('end_date')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit Promosi -->
@foreach ($promosi as $item)
    <!-- Modal Edit -->
    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="editLabel{{ $item->id }}"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> <!-- Modal berada di tengah -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLabel{{ $item->id }}">Edit Promosi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('promosi.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$item->title}}">
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Foto Promosi</label>
                            <input type="file" class="form-control" name="photo" id="photo">
                        </div>
                        <small>foto lama</small><br>
                        <img src="{{asset('storage/photos/'. $item->photo)}}" alt="" height="100px">
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="start_date"
                                value="{{ $item->start_date }}">
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="end_date" value="{{ $item->end_date }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
<style>
    .small-img {
        width: 50%; /* Adjust the percentage as needed */
        max-width: 200px; /* Set a max width if necessary */
    }
</style>
@foreach ($promosi as $item)
    <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" aria-labelledby="detailLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailLabel{{ $item->id }}">Detail Promosi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{ asset('storage/photos//' . $item->photo) }}" class="img-fluid rounded small-img" alt="Foto Promosi"> <!-- Adjusted width with custom class -->
                    </div>
                    <hr>
                    <p><strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($item->start_date)->translatedFormat('d-M-Y') }}</p>
                    <p><strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($item->end_date)->translatedFormat('d-M-Y') }}</p>
                </div>  
            </div>
        </div>
    </div>
@endforeach
