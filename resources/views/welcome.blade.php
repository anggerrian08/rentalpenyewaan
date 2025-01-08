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
                            <a href="{{ route('login') }}" class="btn btn-primary me-0 me-sm-2 mx-1">Masuk</a>
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
                @foreach ($cars as $car)
                    <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                        <div class="card p-2">
                            <h3>{{ $car->name }}</h3>
                            <p class="brand">{{ $car->brand }}</p>
                            <div class="love-icon">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                            <img src="{{ asset('storage/uploads/car/'. $car->photo) }}" alt="{{ $car->merek->name}}" class="car-image img-fluid">
                            <div class="details mt-2">
                                <span><i class="fa-solid fa-gas-pump"></i> {{ $car->fuel_type }}</span>
                                <span><i class="fa-solid fa-gears"></i> {{ $car->type_transmisi }}</span>
                                <span><i class="fa-solid fa-users"></i> {{ $car->passenger_capacity }} Orang</span>
                            </div>
                            <div class="price mt-2">
                                <p>Rp. {{ number_format($car->price, 2, ',', '.') }}/ <span>hari</span></p>
                            </div>
                            <a href="{{ route('car.show', $car->id) }}" class="pesan-btn">
                                <i class=" btn-primary"></i> Show
                            </a>
                        </div>
                    </div>
                @endforeach
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
            <h2>Testimonials</h2>
            <p>Lorem ipsum dolor sit amet consectetur. Ridiculus commodo nunc eleifend quam magna suspendisse arcu. Cras
                tempor ultrices amet feugiat nam consectetur. Sed vitae molestie at a lobortis pulvinar. Pulvinar purus
                blandit dignissim diam scelerisque ut. Laoreet rhoncus sed mi tortor pretium. Fusce scelerisque pretium
                suscipit elementum viverra. Purus accumsan eu diam </p>
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
    <!-- Clients Section -->
    <section id="clients" class="clients section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "breakpoints": {
                  "320": {
                    "slidesPerView": 2,
                    "spaceBetween": 40
                  },
                  "480": {
                    "slidesPerView": 3,
                    "spaceBetween": 60
                  },
                  "640": {
                    "slidesPerView": 4,
                    "spaceBetween": 80
                  },
                  "992": {
                    "slidesPerView": 6,
                    "spaceBetween": 120
                  }
                }
              }
            </script>
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="assets.user/img/brem.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets.user/img/brem.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets.user/img/brem.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets.user/img/brem.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets.user/img/brem.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets.user/img/brem.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets.user/img/brem.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets.user/img/brem.png" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Clients Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Lorem ipsum dolor sit amet consectetur. Ridiculus commodo nunc eleifend quam magna suspendisse arcu. Cras
                tempor ultrices amet feugiat </p>
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
