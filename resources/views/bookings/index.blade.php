@extends('layouts.navuser')

@section('content')

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
        display: flex;
        flex-direction: row;
        border-radius: 10px;
        margin: 10px;
        margin-top: 30px;
        box-shadow: 0 4px 6px rgba(77, 76, 76, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        background-color: #fff;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 10px rgba(55, 54, 54, 0.2);
    }

    .image-section {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        background-color: #f8f9fa;
    }

    .main-image {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .thumbnail-container {
        display: flex;
        gap: 5px;
        margin-top: 10px;
    }

    .thumbnail-container img {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .thumbnail-container img:hover {
        transform: scale(1.1);
    }

    .info-section {
        flex: 2;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .info-section h1 {
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .info-section h2 {
        font-size: 1.4rem;
        color: #28a745;
        margin-bottom: 20px;
    }

    .info-section ul {
        list-style: none;
        padding: 0;
        margin: 0 0 20px 0;
    }

    .info-section ul li {
        margin-bottom: 5px;
        font-size: 0.95rem;
    }

    .info-section ul li strong {
        font-weight: bold;
    }

    .info-section .description {
        font-size: 0.9rem;
        color: #6c757d;
        margin-bottom: 20px;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .order-btn, .favorite-btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s;
    }

    .order-btn {
        background-color: #0d6efd;
        color: #fff;
    }

    .order-btn:hover {
        background-color: #0056b3;
    }

    .favorite-btn {
        background-color: #6c757d;
        color: #fff;
    }

    .favorite-btn:hover {
        background-color: #5a6268;
    }

    @media (max-width: 768px) {
        .card {
            flex-direction: column;
        }

        .info-section {
            flex: 1 1 auto;
        }
    }

    .review-section {
        margin-top: 40px;
    }

    .review-header {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .review-header .average {
        font-size: 3rem;
        font-weight: bold;
        text-align: center;
    }

    .review-header .stars {
        color: #ffc107;
        margin-top: 5px;
    }

    .review-header .breakdown {
        flex: 1;
    }

    .review-item {
        display: flex;
        gap: 15px;
        padding: 20px;
        margin-bottom: 10px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .review-item img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .review-item .content {
        flex: 1;
    }

    .review-item .content h4 {
        margin: 0;
        font-size: 1rem;
        font-weight: bold;
    }

    .review-item .content .stars {
        color: #ffc107;
        margin: 5px 0;
    }

    .review-item .content p {
        margin: 5px 0 0;
        font-size: 0.9rem;
        color: #6c757d;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        margin: 0 5px;
        padding: 8px 12px;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        text-decoration: none;
        color: #007bff;
    }

    .pagination a.active {
        background-color: #007bff;
        color: #fff;
    }

    .pagination a:hover {
        background-color: #e9ecef;
    }

    </style>

<br><br>
    <div class="card">
        <div class="image-section">
            <img src="https://via.placeholder.com/300" alt="Avanza Veloz" class="main-image">
            <div class="thumbnail-container">
                <img src="https://via.placeholder.com/50" alt="Thumbnail 1" class="selected">
                <img src="https://via.placeholder.com/50" alt="Thumbnail 2">
                <img src="https://via.placeholder.com/50" alt="Thumbnail 3">
                <img src="https://via.placeholder.com/50" alt="Thumbnail 4">
            </div>
        </div>
        <div class="info-section">
            <h1>Avanza Veloz</h1>
            <h2>Rp. 100.000,00 /hari</h2>
            <ul>
                <li><strong>Merk mobil:</strong> <span>Toyota</span></li>
                <li><strong>Jenis mobil:</strong> <span>GT 86</span></li>
                <li><strong>Tahun pembuatan:</strong> <span>17-08-1945</span></li>
                <li><strong>Muatan orang:</strong> <span>10</span></li>
                <li><strong>Jenis bahan bakar:</strong> <span>Bensin</span></li>
                <li><strong>Jenis transmisi:</strong> <span>Manual</span></li>
                <li><strong>Muatan koper:</strong> <span>10</span></li>
            </ul>
            <p class="description">
                Lorem ipsum dolor sit amet consectetur. Neque egestas pellentesque nulla vestibulum in sodales magna sagittis.
                Pharetra sapien sem vestibulum amet. Dolor tristique aliquet vel id lorem velit.
            </p>
            <div class="actions">
                <button class="order-btn">Pesan Sekarang</button>
                <button class="favorite-btn">Tambah Ke Favorit</button>
            </div>
        </div>
    </div>

    <!-- Review Section -->
    <div class="review-section">
        <div class="review-header">
            <div class="average">
                4,6
                <div class="stars">★★★★★</div>
                <small>500 Review</small>
            </div>
            <div class="breakdown">
                <div>5 ★★★★★ <span style="color: #ffc107;">■■■■■</span></div>
                <div>4 ★★★★☆ <span style="color: #ffc107;">■■■□□</span></div>
                <div>3 ★★★☆☆ <span style="color: #ffc107;">■■□□□</span></div>
            </div>
        </div>
        <div class="review-item">
            <img src="https://via.placeholder.com/50" alt="Reviewer">
            <div class="content">
                <h4>Eva</h4>
                <div class="stars">★★★★★</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, quos.</p>
            </div>
        </div>
        <div class="review-item">
            <img src="https://via.placeholder.com/50" alt="Reviewer">
            <div class="content">
                <h4>Angger</h4>
                <div class="stars">★★★★★</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, quos.</p>
            </div>
        </div>
        <div class="review-item">
            <img src="https://via.placeholder.com/50" alt="Reviewer">
            <div class="content">
                <h4>Fathir</h4>
                <div class="stars">★★★★★</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, quos.</p>
            </div>
        </div>
        <div class="pagination">
            <a href="#">1</a>
            <a href="#" class="active">2</a>
            <a href="#">3</a>
        </div>
    </div>

@endsection
