
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
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .car-image {
            width: 100%;
            height: auto;
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
        .card {
            position: relative;
            /* Menjadikan .love-icon absolute dalam card */
            background-color: #ffffff;
            width: 250px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
        }

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
                            <i class="bi bi-gear-fill me-2"></i>
                            Working for your success
                        </div>


                        <h1 class="mb-4">
                            Perjalanan Nyaman,<br>

                            <span class="accent-text">Harga Aman!</span>
                        </h1>

                        <p class="mb-4 mb-md-5">
                            Kami mengutamakan kenyamanan perjalanan Anda dengan menyediakan armada mobil yang terawat dan
                            siap digunakan kapan saja.
                        </p>

                        <div class="hero-buttons">
                            <a href="#about" class="btn btn-primary me-0 me-sm-2 mx-1">Masuk</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                        <img src="assets.user/img/landing.png" alt="Hero Image" class="img-fluid" width="450px">

                        {{-- <div class="customers-badge">
                            <div class="customer-avatars">
                                <img src="assets.user/img/avatar-1.webp" alt="Customer 1" class="avatar">
                                <img src="assets.user/img/avatar-2.webp" alt="Customer 2" class="avatar">
                                <img src="assets.user/img/avatar-3.webp" alt="Customer 3" class="avatar">
                                <img src="assets.user/img/avatar-4.webp" alt="Customer 4" class="avatar">
                                <img src="assets.user/img/avatar-5.webp" alt="Customer 5" class="avatar">
                                <span class="avatar more">12+</span>
                            </div>
                            <p class="mb-0 mt-2">12,000+ lorem ipsum dolor sit amet consectetur adipiscing elit</p>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div class="stat-content">
                            <h4>3x Won Awards</h4>
                            <p class="mb-0">Vestibulum ante ipsum</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <div class="stat-content">
                            <h4>6.5k Faucibus</h4>
                            <p class="mb-0">Nullam quis ante</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="stat-content">
                            <h4>80k Mauris</h4>
                            <p class="mb-0">Etiam sit amet orci</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <div class="stat-content">
                            <h4>6x Phasellus</h4>
                            <p class="mb-0">Vestibulum ante ipsum</p>
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
                    <h2 class="about-title">Voluptas enim suscipit temporibus</h2>
                    <p class="about-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                        veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

                    <div class="row feature-list-wrapper">
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill"></i> Lorem ipsum dolor sit amet</li>
                                <li><i class="bi bi-check-circle-fill"></i> Consectetur adipiscing elit</li>
                                <li><i class="bi bi-check-circle-fill"></i> Sed do eiusmod tempor</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill"></i> Incididunt ut labore et</li>
                                <li><i class="bi bi-check-circle-fill"></i> Dolore magna aliqua</li>
                                <li><i class="bi bi-check-circle-fill"></i> Ut enim ad minim veniam</li>
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
            <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit</h2>
            <p>Lorem ipsum dolor sit amet consectetur. Ridiculus commodo nunc eleifend quam magna suspendisse arcu. Cras
                tempor ultrices amet feugiat nam consectetur. Sed vitae molestie at a lobortis pulvinar. Pulvinar purus
                blandit dignissim diam scelerisque ut. Laoreet rhoncus sed mi tortor pretium. Fusce scelerisque pretium
                suscipit elementum viverra. Purus accumsan eu diam </p>
        </div><!-- End Section Title -->

        <div class="container mt-4">
            <div class="row">
                <div class="col-3">
                    <div class="card p-2">
                        <h3>Avanza Veloz</h3>
                        <p class="brand">Toyota</p>
                        <div class="love-icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <img src="assets.user/img/mobil1.png" alt="Avanza Veloz" class="car-image img-fluid">
                        <div class="details mt-2">
                            <span><i class="fa-solid fa-gas-pump"></i> Bensin</span>
                            <span><i class="fa-solid fa-gears"></i> Manual</span>
                            <span><i class="fa-solid fa-users"></i> 4 Orang</span>
                        </div>
                        <div class="price mt-2">
                            <p>Rp. 100.000,00/ <span>hari</span></p>
                        </div>
                        <button class="pesan-btn btn btn-primary">Pesan</button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-2">
                        <h3>Avanza Veloz</h3>
                        <p class="brand">Toyota</p>
                        <div class="love-icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <img src="assets.user/img/mobil1.png" alt="Avanza Veloz" class="car-image img-fluid">
                        <div class="details mt-2">
                            <span><i class="fa-solid fa-gas-pump"></i> Bensin</span>
                            <span><i class="fa-solid fa-gears"></i> Manual</span>
                            <span><i class="fa-solid fa-users"></i> 4 Orang</span>
                        </div>
                        <div class="price mt-2">
                            <p>Rp. 100.000,00/ <span>hari</span></p>
                        </div>
                        <button class="pesan-btn btn btn-primary">Pesan</button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-2">
                        <h3>Avanza Veloz</h3>
                        <p class="brand">Toyota</p>
                        <div class="love-icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <img src="assets.user/img/mobil1.png" alt="Avanza Veloz" class="car-image img-fluid">
                        <div class="details mt-2">
                            <span><i class="fa-solid fa-gas-pump"></i> Bensin</span>
                            <span><i class="fa-solid fa-gears"></i> Manual</span>
                            <span><i class="fa-solid fa-users"></i> 4 Orang</span>
                        </div>
                        <div class="price mt-2">
                            <p>Rp. 100.000,00/ <span>hari</span></p>
                        </div>
                        <button class="pesan-btn btn btn-primary">Pesan</button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-2">
                        <h3>Avanza Veloz</h3>
                        <p class="brand">Toyota</p>
                        <div class="love-icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <img src="assets.user/img/mobil1.png" alt="Avanza Veloz" class="car-image img-fluid">
                        <div class="details mt-2">
                            <span><i class="fa-solid fa-gas-pump"></i> Bensin</span>
                            <span><i class="fa-solid fa-gears"></i> Manual</span>
                            <span><i class="fa-solid fa-users"></i> 4 Orang</span>
                        </div>
                        <div class="price mt-2">
                            <p>Rp. 100.000,00/ <span>hari</span></p>
                        </div>
                        <button class="pesan-btn btn btn-primary">Pesan</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="card p-2">
                        <h3>Avanza Veloz</h3>
                        <p class="brand">Toyota</p>
                        <div class="love-icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <img src="assets.user/img/mobil1.png" alt="Avanza Veloz" class="car-image img-fluid">
                        <div class="details mt-2">
                            <span><i class="fa-solid fa-gas-pump"></i> Bensin</span>
                            <span><i class="fa-solid fa-gears"></i> Manual</span>
                            <span><i class="fa-solid fa-users"></i> 4 Orang</span>
                        </div>
                        <div class="price mt-2">
                            <p>Rp. 100.000,00/ <span>hari</span></p>
                        </div>
                        <button class="pesan-btn btn btn-primary">Pesan</button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-2">
                        <h3>Avanza Veloz</h3>
                        <p class="brand">Toyota</p>
                        <div class="love-icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <img src="assets.user/img/mobil1.png" alt="Avanza Veloz" class="car-image img-fluid">
                        <div class="details mt-2">
                            <span><i class="fa-solid fa-gas-pump"></i> Bensin</span>
                            <span><i class="fa-solid fa-gears"></i> Manual</span>
                            <span><i class="fa-solid fa-users"></i> 4 Orang</span>
                        </div>
                        <div class="price mt-2">
                            <p>Rp. 100.000,00/ <span>hari</span></p>
                        </div>
                        <button class="pesan-btn btn btn-primary">Pesan</button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-2">
                        <h3>Avanza Veloz</h3>
                        <p class="brand">Toyota</p>
                        <div class="love-icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <img src="assets.user/img/mobil1.png" alt="Avanza Veloz" class="car-image img-fluid">
                        <div class="details mt-2">
                            <span><i class="fa-solid fa-gas-pump"></i> Bensin</span>
                            <span><i class="fa-solid fa-gears"></i> Manual</span>
                            <span><i class="fa-solid fa-users"></i> 4 Orang</span>
                        </div>
                        <div class="price mt-2">
                            <p>Rp. 100.000,00/ <span>hari</span></p>
                        </div>
                        <button class="pesan-btn btn btn-primary">Pesan</button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-2">
                        <h3>Avanza Veloz</h3>
                        <p class="brand">Toyota</p>
                        <div class="love-icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <img src="assets.user/img/mobil1.png" alt="Avanza Veloz" class="car-image img-fluid">
                        <div class="details mt-2">
                            <span><i class="fa-solid fa-gas-pump"></i> Bensin</span>
                            <span><i class="fa-solid fa-gears"></i> Manual</span>
                            <span><i class="fa-solid fa-users"></i> 4 Orang</span>
                        </div>
                        <div class="price mt-2">
                            <p>Rp. 100.000,00/ <span>hari</span></p>
                        </div>
                        <button class="pesan-btn btn btn-primary">Pesan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimonials</h2>
            {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
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

    <!-- Services Section -->
    <section id="services" class="services section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card d-flex">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-activity"></i>
                        </div>
                        <div>
                            <h3>Nesciunt Mete</h3>
                            <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus
                                dolores iure perferendis tempore et consequatur.</p>
                            <a href="service-details.html" class="read-more">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Card -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card d-flex">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <div>
                            <h3>Eosle Commodi</h3>
                            <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque
                                eum hic non ut nesciunt dolorem.</p>
                            <a href="service-details.html" class="read-more">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Card -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card d-flex">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-easel"></i>
                        </div>
                        <div>
                            <h3>Ledo Markt</h3>
                            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id
                                voluptas adipisci eos earum corrupti.</p>
                            <a href="service-details.html" class="read-more">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Card -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card d-flex">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-clipboard-data"></i>
                        </div>
                        <div>
                            <h3>Asperiores Commodit</h3>
                            <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea
                                fuga sit provident adipisci neque.</p>
                            <a href="service-details.html" class="read-more">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Card -->

            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Pricing</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4 justify-content-center">

                <!-- Basic Plan -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="pricing-card">
                        <h3>Basic Plan</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">9.9</span>
                            <span class="period">/ month</span>
                        </div>
                        <p class="description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                            accusantium doloremque laudantium totam.</p>

                        <h4>Featured Included:</h4>
                        <ul class="features-list">
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Duis aute irure dolor
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Excepteur sint occaecat
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Nemo enim ipsam voluptatem
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary">
                            Buy Now
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Standard Plan -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="pricing-card popular">
                        <div class="popular-badge">Most Popular</div>
                        <h3>Standard Plan</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">19.9</span>
                            <span class="period">/ month</span>
                        </div>
                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                            blanditiis praesentium voluptatum.</p>

                        <h4>Featured Included:</h4>
                        <ul class="features-list">
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Lorem ipsum dolor sit amet
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Consectetur adipiscing elit
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Sed do eiusmod tempor
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Ut labore et dolore magna
                            </li>
                        </ul>

                        <a href="#" class="btn btn-light">
                            Buy Now
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Premium Plan -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="pricing-card">
                        <h3>Premium Plan</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">39.9</span>
                            <span class="period">/ month</span>
                        </div>
                        <p class="description">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
                            quam nihil molestiae.</p>

                        <h4>Featured Included:</h4>
                        <ul class="features-list">
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Temporibus autem quibusdam
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Saepe eveniet ut et voluptates
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Nam libero tempore soluta
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Cumque nihil impedit quo
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Maxime placeat facere possimus
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary">
                            Buy Now
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Pricing Section -->

    <!-- Faq Section -->
    <section class="faq-9 faq section light-background" id="faq">

        <div class="container">
            <div class="row">

                <div class="col-lg-5" data-aos="fade-up">
                    <h2 class="faq-title">Have a question? Check out the FAQ</h2>
                    <p class="faq-description">Maecenas tempus tellus eget condimentum rhoncus sem quam semper
                        libero sit amet adipiscing sem neque sed ipsum.</p>
                    <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                        <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                    <div class="faq-container">

                        <div class="faq-item faq-active">
                            <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                            <div class="faq-content">
                                <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus
                                    laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor
                                    rhoncus dolor purus non.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                    interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                    scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                    Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                            <div class="faq-content">
                                <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                    Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl
                                    suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis
                                    convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                    interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                    scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                    Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                            <div class="faq-content">
                                <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse
                                    in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                    suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                            <div class="faq-content">
                                <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed
                                    in suscipit sequi. Distinctio ipsam dolore et.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>
                </div>

            </div>
        </div>
    </section><!-- /Faq Section -->

    <!-- Call To Action 2 Section -->
    <section id="call-to-action-2" class="call-to-action-2 section dark-background">

        <div class="container">
            <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-xl-10">
                    <div class="text-center">
                        <h3>Call To Action</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum.</p>
                        <a class="cta-btn" href="#">Call To Action</a>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Call To Action 2 Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4 g-lg-5">
                <div class="col-lg-5">
                    <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                        <h3>Contact Info</h3>
                        <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante
                            ipsum primis.</p>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="content">
                                <h4>Our Location</h4>
                                <p>A108 Adam Street</p>
                                <p>New York, NY 535022</p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="content">
                                <h4>Phone Number</h4>
                                <p>+1 5589 55488 55</p>
                                <p>+1 6678 254445 41</p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="content">
                                <h4>Email Address</h4>
                                <p>info@example.com</p>
                                <p>contact@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                        <h3>Get In Touch</h3>
                        <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante
                            ipsum primis.</p>

                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required="">
                                </div>

                                <div class="col-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="">
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="col-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit" class="btn">Send Message</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection
