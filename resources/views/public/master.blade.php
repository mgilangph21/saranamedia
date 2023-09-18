<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sarana Media Advertising</title>
    <meta content="Mitra periklanan nomor satu di pulau Jawa" name="description">
    <meta content="Sarana Media Billboard" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/landing/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/landing/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/landing/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/landing/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="/">Sarana Media<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#beranda">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto " href="#contact">Kontak</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="/login" class="get-started-btn scrollto">Masuk</a>
        </div>
    </header><!-- End Header -->

    <main id="main">
        @yield('content')
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        {{-- 
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 footer-contact">
                        <h3>CV. Sarana Media Promosi<span>.</span></h3>
                        <p>
                            Park Royal Regency <br>
                            Blok S2 No. 8 Buduran<br>
                            Sidoarjo - Jawa Timur
                        </p>
                    </div>

                </div>
            </div>
        </div> --}}

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>CV. Sarana Media Promosi</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="#">GH</a>
                </div>
            </div>
            <div class="social-links text-center text-md-end pt-3 pt-md-0">
                {{-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> --}}
                {{-- <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a> --}}
                <a href="https://instagram.com/saranamedia.surabaya" class="instagram"><i
                        class="bx bxl-instagram"></i></a>
                {{-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> --}}
                {{-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/landing/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('/landing/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('/landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/landing/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/landing/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/landing/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/landing/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/landing/assets/js/main.js') }}"></script>

    @stack('js')

</body>

</html>
