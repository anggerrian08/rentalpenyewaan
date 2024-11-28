<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyRental</title>
    {{-- logo title --}}
    <link rel="icon" type="image/x-icon" href="vendor/asset/img/" >
    <link rel="stylesheet" href="{{ asset('vendor/asset/style.css') }}">

    <!--berfungsi untuk swipe pada bagian review dan brand-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!--untuk memunculkan icon user dan cari-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!--icon loadingnya-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-HJxx8fGCE9DJqNMz+wnfOeOXTYOwA2wJT+M35XGO3w3gIF5W7EfeU0fbhuBeyP5w" crossorigin="anonymous">
</head>
<body>

    <!--header section star-->

    <header>

        <!--menambahkan menu garis tiga-->
        <div id="menu-bar" class="fas fa-bars">

        </div>

        {{-- logo navbar --}}
        <a href="#" class="logo"><img src="vendor/asset/img/" alt=""></a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#book">Book</a>
            <a href="#packages">Packages</a>
            <a href="#service">Services</a>
            <a href="#gallery">Gallery</a>
            <a href="#review">Review</a>
            <a href="#contact">Contact</a>
        </nav>
    <!--icons cari dan juga login-->
        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <a href="{{ route('login') }}"><i class="fas fa-user" id="login-btn"></i></a>
          </div>

          <!--pada bagian cari akan diberi tulisan-->
        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search here...">
            <label for="search-bar" class="fas fa-search"></label>
        </form>
    </header>
    <!--header section end-->

    <!--login from container-->
    <!--untuk bagian formulir login-->
    {{-- <div class="login-form-container" id="login-form"> --}}

        <!--untuk icon x atau close pada login-->
        <i class="fas fa-times " id="form-close"></i>

        <!--untuk bagian mengisi login-->
        {{-- <form action="">
            <h3>Login</h3>
            <input type="email" class="box" placeholder="enter your email">
            <input type="password" class="box" placeholder="password">
            <input type="submit" value="login now" class="btn">
            <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p>forget password? <a href="#">click here</a></p>
            <p>don't have and account? <a href="#">register now</a></p>
        </form> --}}
    </div>

<!--home section starts-->
<section class="home" id="home"> <!--kalau tidak ada id maka tombol diatas navbar tidak akan bisa dipencet-->
<div class="content">
    <h3>Jelajahi Kota dengan Mudah</h3>
    <p>Sewa Mobil Terbaik untuk Liburan, Bisnis, atau Kebutuhan Harian Anda</p>
    <a href="#" class="btn">lihat penawaran</a>
</div>

<!--bagian video home yang dapat diganti-ganti dg mengactive kan video agar vidio tersebu aktif-->
<div class="controls">
    <span class="vid-btn active" data-src="vendor/asset/img/mclaren5.mp4"></span>
    <span class="vid-btn" data-src="vendor/asset/img/mclaren.mp4"></span>
    <span class="vid-btn" data-src="vendor/asset/img/mclaren3.mp4"></span>
    <span class="vid-btn" data-src="vendor/asset/img/mclaren4.mp4"></span>
    <span class="vid-btn" data-src="vendor/asset/img/mclaren2.mp4"></span>
</div>

<div class="video-container"> <!--loop autoplay muted berfungsi agar vidio yang ditampilkan akan bisa diplay-->
    <video src="vendor/asset/img/mclaren5.mp4" id="video-slider" loop autoplay muted></video>
</div>

</section>
<!--home section end-->

<!--book section starts-->
<section class="book" id="book">
    <h1 class="heading">
        <span>b</span>
        <span>o</span>
        <span>o</span>
        <span>k</span>
        <span class="space"></span>
        <span>n</span>
        <span>o</span>
        <span>w</span>
    </h1>

    <div class="row">
        <div class="image"> <!-- Gambar di bagian kiri -->
            <img src="vendor/asset/img/booknows.jpg" alt="Rental Car">
        </div>
        <form action="">
            <div class="inputBox">
                <h3>Lokasi Penjemputan</h3>
                <input type="text" placeholder="Masukkan lokasi penjemputan">
            </div>
            <div class="inputBox">
                <h3>Tanggal Mulai</h3>
                <input type="date">
            </div>
            <div class="inputBox">
                <h3>Tanggal Selesai</h3>
                <input type="date">
            </div>
            <div class="inputBox">
                <h3>Durasi Sewa</h3>
                <input type="number" placeholder="Masukkan jumlah hari">
            </div>
            <input type="submit" class="btn" value="book now">
        </form>
    </div>

</section>
<!--book section end-->

<!--packages section starts-->
<section class="packages" id="packages">

        <h1 class="heading">
            <span>p</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="box-container">
            <div class="box" >
                <img src="vendor/asset/img/pkgs10.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-car"></i> McLaren Senna </h3>
                    <p>Spesifikasi</p>
                    Top Speed: 335 km/jam <br>
                    Akselerasi: 0-100 km/jam dalam 2,8 detik <br>
                    Interior Premium: Kabin berbahan serat karbon dan kursi balap<br>
                    {{-- <div class="stars"> <!--memunculkan bintang pada bagian packages-->
                        <i class="fas fa-star"></i> <!--diberi lima iclass fa star karena supaya muncul bintang 5 dan apabila diganti menjadi far bintangnya tidak berwarna orange-->
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i><!--contohnya ini-->
                    </div> --}}
                    <div class="price"> Rp.2.455.900 <span>Rp.4.500.000</span></div>
                    <a href="{{ route('login') }}" class="btn">book now</a>
                </div>
            </div>

            <div class="box">
                <img src="vendor/asset/img/pkgs4.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-car"></i> Pajero V93 </h3>
                    <p>Spesifikasi</p>
                    Transmisi: Otomatis 5-percepatan <br>
                    Kapasitas Tangki Bahan Bakar: 88 Liter <br>
                    Kapasitas Penumpang: 7 orang <br>
                    {{-- <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div> --}}
                    <div class="price"> Rp.1.200.000 <span>Rp.3.000.000</span></div>
                    <a href="" class="btn">book now</a>
                </div>
            </div>

            <div class="box">
                <img src="vendor/asset/img/pkgs5.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-car"></i> Bugatti La Voiture </h3>
                    <p>Spesifikasi</p>
                    Kecepatan Maksimum: 420 km/jam <br>
                    Akselerasi: 0-100 km/jam dalam 2,5 detik <br>
                    Material Body: Carbon Fiber yang ringan dan kuat <br>
                    {{-- <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div> --}}
                    <div class="price"> Rp.16.899.000 <span>Rp.18.080.000</span></div>
                    <a href="" class="btn">book now</a>
                </div>
            </div>

            <div class="box">
                <img src="vendor/asset/img/pkgs6.webp" alt="">
                <div class="content">
                    <h3><i class="fas fa-car"></i> BWM M4 </h3>
                    <p>Spesifikasi</p>
                    Transmisi: 6-speed manual atau 8-speed automatic <br>
                    Kecepatan Maksimum: 290 km/jam (dengan paket M Driver) <br>
                    Akselerasi: 0-100 km/jam dalam 3,8 detik (varian Competition) <br>
                    {{-- <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div> --}}
                    <div class="price"> Rp.17.000.000 <span>Rp.17.600.000</span></div>
                    <a href="" class="btn">book now</a>
                </div>
            </div>

            <div class="box">
                <img src="vendor/asset/img/pkgs7.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-car"></i> La Ferrari </h3>
                    <p>Spesifikasi</p>
                    Transmisi: 7-speed dual-clutch automatic <br>
                    Kecepatan Maksimum: 350 km/jam <br>
                    Akselerasi: 0-100 km/jam dalam 2,6 detik <br>
                    {{-- <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div> --}}
                    <div class="price"> Rp.15.900.000 <span>Rp.19.999.000</span></div>
                    <a href="" class="btn">book now</a>
                </div>
            </div>

            <div class="box">
                <img src="vendor/asset/img/pkgs8.webp" alt="">
                <div class="content">
                    <h3><i class="fas fa-car"></i> Rolls Royce Boat Tail </h3>
                    <p>Spesifikasi</p>
                    Transmisi: 8-speed automatic ZF <br>
                    Kecepatan Maksimum: 250 km/jam (dibatasi elektronik) <br>
                    Akselerasi: 0-100 km/jam dalam 5,3 detik <br>
                    {{-- <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div> --}}
                    <div class="price"> Rp.18.999.000 <span>Rp.20.500.000</span></div>
                    <a href="" class="btn">book now</a>
                </div>
            </div>

        <div class="box">
            <img src="vendor/asset/img/pkgs14.webp" alt="">
            <div class="content">
                <h3><i class="fas fa-car"></i> Rimac Nevera </h3>
                <p>Spesifikasi</p>
                Jenis: Hypercar listrik sepenuhnya <br>
                Motor Elektrik: 4 motor listrik independen (1 di setiap roda) <br>
                Tenaga Maksimum: 1.914 HP (1.408 kW) <br>
                {{-- <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div> --}}
                <div class="price"> Rp.23.999.000 <span>Rp.25.700.000</span></div>
                <a href="" class="btn">book now</a>
            </div>
        </div>

        <div class="box">
            <img src="vendor/asset/img/pkgs11.jpg" alt="">
            <div class="content">
                <h3><i class="fas fa-car"></i> McLaren P1 </h3>
                <p>Spesifikasi</p>
                Mesin Pembakaran Internal: 3.8L Twin-Turbo V8 <br>
                Motor Listrik: Motor listrik ringan yang terintegrasi <br>
                Tenaga Maksimum: Total 903 HP 727 HP dari mesin bensin <br>
                {{-- <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div> --}}
                <div class="price"> Rp.18.933.000 <span>Rp.19.599.000</span></div>
                <a href="" class="btn">book now</a>
            </div>
        </div>

        <div class="box">
            <img src="vendor/asset/img/pkgs12.jpg" alt="">
            <div class="content">
                <h3><i class="fas fa-car"></i> Lamborghini Sian FKP 37 </h3>
                <p>Spesifikasi</p>
                Jenis: Hypercar hibrida ringan (Mild Hybrid) <br>
                Mesin Pembakaran Internal: 6.5L V12 Naturally Aspirated <br>
                Motor Listrik: Sistem 48V superkapasitor (ekstra ringan dan efisien) <br>
                {{-- <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div> --}}
                <div class="price"> Rp.11.650.000 <span>Rp.14.080.000</span></div>
                <a href="" class="btn">book now</a>
            </div>
        </div>
</section>
<!--packages section end-->

<!--service section starts-->
<section class="service" id="service">
    <h1 class="heading">
        <span>s</span>
        <span>e</span>
        <span>r</span>
        <span>v</span>
        <span>i</span>
        <span>c</span>
        <span>e</span>
        <span>s</span>
    </h1>
    <div class="box-container">
        <div class="box">
            <i class="fas fa-car"></i> <!-- Icon Mobil -->
            <h3>Sewa Mobil</h3>
            <p>Pilih dari berbagai macam kendaraan untuk perjalanan Anda. Baik untuk bisnis atau liburan, kami menawarkan pilihan sewa yang mudah dan terjangkau.</p>
        </div>
        <div class="box">
            <i class="fas fa-cogs"></i> <!-- Icon Perawatan Mobil -->
            <h3>Perawatan Mobil</h3>
            <p>Kami menyediakan mobil dengan kondisi terawat dan pengecekan rutin untuk memastikan kenyamanan dan keamanan Anda di jalan.</p>
        </div>
        <div class="box">
            <i class="fas fa-tachometer-alt"></i> <!-- Icon Kecepatan -->
            <h3>Mobil Cepat & Andal</h3>
            <p>Mobil kami dilengkapi dengan teknologi terbaru untuk pengalaman berkendara yang cepat, efisien, dan nyaman.</p>
        </div>
        <div class="box">
            <i class="fas fa-map-marked-alt"></i> <!-- Icon Peta -->
            <h3>Jelajahi Tempat Baru</h3>
            <p>Temukan destinasi baru dan buat pengalaman tak terlupakan dengan kendaraan sewaan kami yang andal dan nyaman untuk perjalanan jauh.</p>
        </div>
        <div class="box">
            <i class="fas fa-credit-card"></i> <!-- Icon Pembayaran -->
            <h3>Pilihan Pembayaran Mudah</h3>
            <p>Nikmati pilihan pembayaran yang mudah dan fleksibel. Sewa mobil Anda dengan mudah dan bayar dengan aman, baik secara online maupun saat pengambilan.</p>
        </div>
        <div class="box">
            <i class="fas fa-shield-alt"></i> <!-- Icon Keamanan -->
            <h3>Asuransi & Keamanan</h3>
            <p>Keamanan Anda adalah prioritas kami. Semua mobil sewaan dilengkapi dengan opsi asuransi untuk memberi Anda ketenangan pikiran di jalan.</p>
        </div>
    </div>
</section>
<!--service section end-->

<!--gallery section starts-->
<section class="gallery" id="gallery">
    <h1 class="heading">
        <span>g</span>
        <span>a</span>
        <span>l</span>
        <span>l</span>
        <span>e</span>
        <span>r</span>
        <span>y</span>
    </h1>

    <div class="box-container">

        <div class="box">
            <img src="vendor/asset/img/g1.jpg" alt="">
            <div class="content">
                <h3>Our Car Collection</h3>
                <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
                <a href="#gallery" class="btn" onclick="openPopup('vendor/asset/img/g1.jpg')">see more</a> <!--diberi btn karena untuk bisa dipencet-->
            </div>
        </div>


        <div class="box">
            <img src="vendor/asset/img/g2.webp" alt="">
            <div class="content">
                <h3>Our Car Collection</h3>
                <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
                <a href="#gallery" class="btn" onclick="openPopup('vendor/asset/img/g2.webp')">see more</a>
            </div>
        </div>


        <div class="box">
            <img src="vendor/asset/img/g3.jpg" alt="">
            <div class="content">
                <h3>Our Car Collection</h3>
                <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
                <a href="#gallery" class="btn" onclick="openPopup('vendor/asset/img/g3.jpg')">see more</a>
            </div>
        </div>


        <div class="box">
            <img src="vendor/asset/img/g4.jpg" alt="">
            <div class="content">
                <h3>Our Car Collection</h3>
                <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
                <a href="#gallery" class="btn" onclick="openPopup('vendor/asset/img/g4.jpg')">see more</a>
            </div>
        </div>


        <div class="box">
            <img src="vendor/asset/img/g5.webp" alt="">
            <div class="content">
                <h3>Our Car Collection</h3>
                <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
                <a href="#gallery" class="btn" onclick="openPopup('vendor/asset/img/g5.webp')">see more</a>
            </div>
        </div>


        <div class="box">
            <img src="vendor/asset/img/g6.jpg" alt="">
            <div class="content">
                <h3>Our Car Collection</h3>
                <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
                <a href="#gallery" class="btn" onclick="openPopup('vendor/asset/img/g6.jpg')">see more</a>
            </div>
        </div>


        <div class="box">
            <img src="vendor/asset/img/g7.jpg" alt="">
            <div class="content">
                <h3>Our Car Collection</h3>
                <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
                <a href="#gallery" class="btn" onclick="openPopup('vendor/asset/img/g7.jpg')">see more</a>
            </div>
        </div>


        <div class="box">
            <img src="vendor/asset/img/g8.jpeg" alt="">
            <div class="content">
                <h3>Our Car Collection</h3>
                <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
                <a href="#gallery" class="btn" onclick="openPopup('vendor/asset/img/g8.jpeg')">see more</a>
            </div>
        </div>

        <div class="box">
            <img src="vendor/asset/img/g9.jpeg" alt="">
            <div class="content">
                <h3>Our Car Collection</h3>
                <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
                <a href="#gallery" class="btn" onclick="openPopup('vendor/asset/img/g9.jpeg')">see more</a>
            </div>
        </div>
<!--pop up bagian gallery start-->
        <div class="popup" id="myPopup">
            <span class="close" onclick="closePopup()">&times;</span><!--&times; untuk tombol close-->
            <img id="popupImg" src="vendor/asset/img/g1.jpg" alt="">
            <h3>Our Car Collection</h3>
            <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
        </div>

        <div class="popup" id="myPopup">
            <span class="close" onclick="closePopup()">&times;</span>
            <img id="popupImg" src="vendor/asset/img/g2.webp" alt="">
            <h3>Our Car Collection</h3>
            <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
        </div>

        <div class="popup" id="myPopup">
            <span class="close" onclick="closePopup()">&times;</span>
            <img id="popupImg" src="vendor/asset/img/g3.jpg" alt="">
            <h3>Our Car Collection</h3>
            <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
        </div>

        <div class="popup" id="myPopup">
            <span class="close" onclick="closePopup()">&times;</span>
            <img id="popupImg" src="vendor/asset/img/g4.jpg" alt="">
            <h3>Our Car Collection</h3>
            <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
        </div>

        <div class="popup" id="myPopup">
            <span class="close" onclick="closePopup()">&times;</span>
            <img id="popupImg" src="vendor/asset/img/g5.webp" alt="">
            <h3>Our Car Collection</h3>
            <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
        </div>

        <div class="popup" id="myPopup">
            <span class="close" onclick="closePopup()">&times;</span>
            <img id="popupImg" src="vendor/asset/img/g6.jpg" alt="">
            <h3>Our Car Collection</h3>
            <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
        </div>

        <div class="popup" id="myPopup">
            <span class="close" onclick="closePopup()">&times;</span>
            <img id="popupImg" src="vendor/asset/img/g7.jpg" alt="">
            <h3>Our Car Collection</h3>
            <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
        </div>

        <div class="popup" id="myPopup">
            <span class="close" onclick="closePopup()">&times;</span>
            <img id="popupImg" src="vendor/asset/img/g8.jpeg" alt="">
            <h3>Our Car Collection</h3>
            <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
        </div>

        <div class="popup" id="myPopup">
            <span class="close" onclick="closePopup()">&times;</span>
            <img id="popupImg" src="vendor/asset/img/g9.jpeg" alt="">
            <h3>Our Car Collection</h3>
            <p>Lihat berbagai pilihan mobil terbaik yang tersedia untuk disewa!</p>
        </div>


<!--pop up bagian gallery ends-->
    </div>
</section>

<!--gallery section end-->

<!--review section starts-->
<section class="review" id="review">

    <h1 class="heading">
        <span>r</span>
        <span>e</span>
        <span>v</span>
        <span>i</span>
        <span>e</span>
        <span>w</span>
    </h1>

    <div class="swiper-container review-slider"> <!--agar bisa diswipe kesamping-->
<!--dan review slider ditaruh di script.js-->
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="box">
                    <img src="vendor/asset/img/bright.jpeg" alt="">
                    <h3>bright vachirawit</h3>
                    <p>Saya sangat puas dengan layanan pelanggan yang diberikan oleh agen perjalanan ini. Mereka sangat responsif dan membantu.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> <!-- far buat ngasih bintang separuh-->
                    </div>
                </div>
            </div>

        <div class="swiper-slide">
            <div class="box">
                <img src="vendor/asset/img/chaeunwo.jpg" alt="">
                <h3>cha eun woo</h3>
                <p>Saya sangat puas dengan layanan pelanggan yang diberikan oleh agen perjalanan ini. Mereka sangat responsif dan membantu.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i> <!-- far buat ngasih bintang separuh-->
                </div>
            </div>
        </div>

    <div class="swiper-slide">
        <div class="box">
            <img src="vendor/asset/img/ahnhyoseop.jpeg" alt="">
            <h3>ahn hyo seop</h3>
            <p>Saya sangat puas dengan layanan pelanggan yang diberikan oleh agen perjalanan ini. Mereka sangat responsif dan membantu.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i> <!-- far buat ngasih bintang separuh-->
            </div>
        </div>
    </div>

<div class="swiper-slide">
    <div class="box">
        <img src="vendor/asset/img/dewjsu.jpeg" alt="">
        <h3>dew jsu</h3>
        <p>Saya sangat puas dengan layanan pelanggan yang diberikan oleh agen perjalanan ini. Mereka sangat responsif dan membantu.</p>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <!-- far buat ngasih bintang separuh-->
        </div>
    </div>
</div>
</div>
    </div>
</section>
<!--review section end-->

<!--contact section starts-->
<section class="contact" id="contact">
    <h1 class="heading">
        <span>c</span>
        <span>o</span>
        <span>n</span>
        <span>t</span>
        <span>a</span>
        <span>c</span>
        <span>t</span>
    </h1>

    <div class="row">

        <div class="image"> <!--foto astronout pada bagian kiri-->
            <img src="vendor/asset/img/contact.jpg" alt="">
        </div>

        <form action=""> <!--formulir mengisinya-->
            <div class="inputBox">
                <input type="text" placeholder="name">
                <input type="email" placeholder="email">
            </div>
            <div class="inputBox">
                <input type="number" placeholder="number">
                <input type="text" placeholder="subject">
            </div>
            <textarea placeholder="message" name="" id="" cols="30" rows="10"></textarea>
            <input type="submit" class="btn" value="send message">
        </form>
    </div>

</section>
<!--contact section end-->

<!--brand section-->
<section class="brand-container">
    <div class="swiper-container brand-slider"> <!--diberi class swiper untuk bisa diswipe sendiri apabila layar dikecilkan maupun layar full-->
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="vendor/asset/img/1.jpg" alt="brand1"></div>
            <div class="swiper-slide"><img src="vendor/asset/img/2.jpg" alt="brand2"></div>
            <div class="swiper-slide"><img src="vendor/asset/img/3.jpg" alt="brand3"></div>
            <div class="swiper-slide"><img src="vendor/asset/img/4.jpg" alt="brand4"></div>
            <div class="swiper-slide"><img src="vendor/asset/img/5.jpg" alt="brand5"></div>
            <div class="swiper-slide"><img src="vendor/asset/img/6.jpg" alt="brand6"></div>
        </div>
    </div>
</section>

<!--footer section-->
<section class="footer">
    <div class="box-container">

        <div class="box">
            <h3>about us</h3>
            <div class="logo">
                {{-- logo about us --}}
                <img src="vendor/asset/img/" alt="">
            </div>
            <br>
            <div class="logoapk">
                <!--<img src="github-removebg-preview.png" alt="">-->
                <img src="vendor/asset/img/facebook1.jpg" alt="">
                <img src="vendor/asset/img/instagram1.png" alt="">
                <img src="vendor/asset/img/twitter1.png" alt="">
                <img src="vendor/asset/img/github1.jpg" alt="">
            </div>
        </div>
        <div class="box">
            <h3>branch locations</h3>
            <a href="https://g.co/kgs/zpXBB7">Indonesia</a>
            <a href="https://g.co/kgs/5u9hrN">USA</a>
            <a href="https://g.co/kgs/K6fH6g">Korea selatan</a>
            <a href="https://g.co/kgs/j3zaD2">Japan</a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#home">home</a>
            <a href="#book">book</a>
            <a href="#packages">packages</a>
            <a href="#service">services</a>
            <a href="#gallery">gallery</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="">facebook</a>
            <a href="">instagram</a>
            <a href="">twitter</a>
            <a href="">github</a>
        </div>
    </div>
<!--footer section end-->


<!--loader
<div class="loader-container">
    <i class="fas fa-spinner fa-spin"></i>
</div>-->

    <h1 class="credit"> created by <span> MyRental </span>| all rights reserved! </h1>
</section>

   <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!--custom js link-->
    <script src="{{ asset('vendor/asset/script.js') }}"></script>
</body>
</html>
