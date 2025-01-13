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

    .card {
        border-radius: 10px;
        margin: 10px;
        box-shadow: 0 4px 6px rgba(77, 76, 76, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 10px rgba(55, 54, 54, 0.2);
    }

    .card-img-top {
        border-radius: 10px 10px 0 0;
    }

    .card-title {
        font-weight: bold;
        font-size: 1.2em;
    }

    .card-text {
        font-size: 0.9em;
        color: #6c757d;
    }

    .text-white {
        color: #fff !important;
    }

    .mb-1 {
        margin-bottom: 5px;
    }

    .mb-0 {
        margin-bottom: 0;
    }

    .fw-bold {
        font-weight: bold;
    }
</style>
<br>
<!-- Kotak Biru Header -->
<div class="kotak-biru">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <div>
            <h2 class="text-white fw-bold mb-1">Approval Sewa</h2>
            <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Traksaksi | Approval Sewa</p>
        </div>
    </div>
</div>

<div class="col-md-12 project-list">
    <div class="card">
        <div class="row align-items-center">
            <th>Nama penyewa</th>
        </div>
    </div>
</div>
@endsection
