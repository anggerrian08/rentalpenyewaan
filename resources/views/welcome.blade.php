@extends('layouts.navuser')
@section('content')
    <!-- Link FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f7fc;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin: 20px auto;
            width: 80%;
        }

        /* Card Styling */
        .card {
            background-color: #ffffff;
            width: 250px;
            height: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .car-image {
            width: 100%;
            height: 450px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        h3 {
            color: #212529;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .brand {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .details {
            display: flex;
            justify-content: space-between;
            color: #2D465E;
            font-size: 12px;
            margin-bottom: 15px;
        }

        .price {
            font-weight: bold;
            color: #2D465E;
        }

        .price span {
            color: #6c757d;
            font-size: 12px;
        }

        /* Love Icon Styling */
        .love-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #e74c3c;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        .love-icon:hover {
            background-color: #e74c3c;
            color: #fff;
        }

        /* Pesan Button - Radius & Style */
        .pesan-btn {
            background-color: #0D83FD;
            color: #fff;
            border: none;
            border-radius: 20px;
            /* Tambahkan radius */
            padding: 5px 15px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 14px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .pesan-btn:hover {
            background-color: #0056b3;
        }

        /* Card Positioning for Love Icon */
        /* .card {
                position: relative;
                background-color: #ffffff;
                width: 250px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 15px;
                text-align: center;
                transition: all 0.3s ease;
            } */

        .card:hover {
            transform: translateY(-10px);
        }
    </style>
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                        <div class="company-badge mb-4">
                            {{-- <i class="bi bi-gear-fill me-2"></i> --}}
                            Humma RentCar
                        </div>


                        <h1 class="mb-4">
                            Perjalanan Nyaman,<br>

                            <span class="accent-text">Harga Aman!</span>
                        </h1>

                        <p class="mb-4 mb-md-5">
                            Kenyamanan dan harga adalah dua hal yang penting bagi pelanggan. Pilihan ideal untuk perjalanan
                            yang menyenangkan tanpa merusak anggaran!
                        </p>

                        <div class="hero-buttons">
                            @if (Auth()->user())
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary me-0 me-sm-2 mx-1">Masuk</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                        <img src="assets.user/img/landing.png" alt="Hero Image" class="img-fluid" width="450px">
                    </div>
                </div>
            </div>

            <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-cart-check"></i>
                        </div>
                        <div class="stat-content">
                            <p>Pesan Cepat dan Mudah</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div class="stat-content">
                            <p>Lengkap dan Terawat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="stat-content">
                            <p>Perlindungan Asuransi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <div class="stat-content">
                            <p>Harga Kompetitif</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 align-items-center justify-content-between">

                <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                    {{-- <div class="company-badge mb-4">
                        <i class="bi bi-gear-fill me-2"></i>
                        Working for your success
                    </div> --}}
                    <h6 class="about-title">Pilihan Tepat untuk Setiap Perjalanan.</h6>
                    <p class="about-description">Dengan berbagai pilihan kendaraan dan layanan terbaik, kami hadir sebagai
                        solusi rental mobil yang terpercaya untuk setiap momen perjalanan Anda.</p>

                    <div class="row feature-list-wrapper">
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill"></i> Beragam Pilihan Armada</li>
                                <li><i class="bi bi-check-circle-fill"></i> Harga Cukup Terjangkau</li>
                                <li><i class="bi bi-check-circle-fill"></i> Kendaraan dalam Kondisi Prima</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill"></i> Mudah Diakses</li>
                                <li><i class="bi bi-check-circle-fill"></i> Layanan Fleksibel </li>
                                <li><i class="bi bi-check-circle-fill"></i> Pelayanan yang Profesional</li>
                            </ul>
                        </div>
                    </div>


                </div>

                <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="image-wrapper">
                        <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                            <img src="assets.user/img/about-5.webp" alt="Business Meeting"
                                class="img-fluid main-image rounded-4">
                            <img src="assets.user/img/about-2.webp" alt="Team Discussion"
                                class="img-fluid small-image rounded-4">
                        </div>
                        {{-- <div class="experience-badge floating">
                            <h3>15+ <span>Years</span></h3>
                            <p>Of experience in business service</p>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Pilih Mobil Sesuai Kebutuhan Anda</h2>
            <p>Temukan berbagai pilihan mobil yang sesuai dengan kebutuhan perjalanan Anda, mulai dari mobil kompak untuk
                perjalanan pribadi hingga kendaraan besar untuk keluarga atau rombongan. Setiap kendaraan kami dijamin dalam
                kondisi prima dan siap menemani perjalanan Anda. Pilih mobil favorit Anda, tentukan durasi sewa, dan nikmati
                perjalanan tanpa khawatir</p>
        </div><!-- End Section Title -->

        <div class="container">
            @foreach ($cars as $car)
                <div class="card">
                    <h3 style="text-align: left;">{{ $car->name }}</h3>
                    <div class="love-icon">❤</div>
                    <img src="{{ asset('storage/uploads/car/' . $car->photo) }}" alt="{{ $car->merek->name }}"
                        class="car-image img-fluid">
                    <h3>{{ $car->model }}</h3>
                    <p class="brand">{{ $car->brand }}</p>
                    <div class="details">
                        <span class="text-muted">
                            <i class="fas fa-gas-pump"></i> Bensin
                        </span>
                        <span class="text-muted">
                            <i class="fas fa-cogs"></i> Manual
                        </span>
                        <span class="text-muted">
                            <i class="fas fa-user"></i> {{ $car->seats }} Orang
                        </span>
                    </div>
                    <div class="price-button-wrapper">
                        <p class="price text-muted">Rp. {{ number_format($car->price, 0, ',', '.') }}</p>
                        @if (!Auth::user())
                            <a href="{{route('login')}}" class="pesan-btn">Masuk</a>
                        @else
                            <a href="{{ route('car.show', $car->id) }}" class="pesan-btn">pesan</a>
                        @endif
                        {{-- <button class="pesan-btn">Pesan</button> --}}
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination Links -->
        <div class="pagination-wrapper">
            {{ $cars->links() }}
        </div>
    </section>



    <!-- Stats Section -->
    <section id="stats" class="stats section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Clients</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Projects</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Workers</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- /Stats Section -->
    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimoni Pelanggan</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row g-5">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-item">
                        <img src="assets.user/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                            alt="">
                        <h3>Saul Goodman</h3>
                        <h4>Ceo &amp; Founder</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                risus at semper.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-item">
                        <img src="assets.user/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                            alt="">
                        <h3>Sara Wilsson</h3>
                        <h4>Designer</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                legam anim culpa.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-item">
                        <img src="assets.user/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                            alt="">
                        <h3>Jena Karlis</h3>
                        <h4>Store Owner</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                minim.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="testimonial-item">
                        <img src="assets.user/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                            alt="">
                        <h3>Matt Brandon</h3>
                        <h4>Freelancer</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem
                                dolore labore illum veniam.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Hubungi Kami</h2>
            <p>Butuh bantuan? Jangan ragu untuk menghubungi kami melalui formulir di bawah ini.
                Tim kami siap membantu Anda
                dengan senang hati!</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4 g-lg-5">
                <div class="col-lg-5">
                    <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                        <h3>Informasi Kontak</h3>
                        <p>Hubungi kami melalui detail kontak di bawah ini. Kami akan dengan senang hati membantu Anda!</p>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="content">
                                <h4>Lokasi Kantor</h4>
                                <p>PT Humma Teknologi Indonesia</p>
                                <p>Malang, Jawa Timur</p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="content">
                                <h4>Nomor Telepon</h4>
                                <p>+1 5589 55488 55</p>
                                <p>+1 6678 254445 41</p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="content">
                                <h4>Alamat Email</h4>
                                <p>hummarentcar@gmail.com</p>
                                <p>contact@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                        <h3>Hubungi kami</h3>
                        <p>Jika Anda memiliki pertanyaan atau butuh bantuan, jangan ragu untuk mengirimkan pesan kepada kami
                            melalui formulir ini.</p>

                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Nama anda"
                                        required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        required="">
                                </div>

                                <div class="col-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Judul"
                                        required="">
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
                                </div>

                                <div class="col-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit" class="btn">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->
@endsection
