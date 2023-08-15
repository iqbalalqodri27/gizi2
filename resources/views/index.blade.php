<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tumbuh Kembang</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="Impact/assets/img/favicon.png" rel="icon">
  <link href="Impact/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Impact/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="Impact/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="Impact/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="Impact/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="Impact/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="Impact/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">durensawit.oke@gmail.com</a></i>
        <i class="bi bi-instagram d-flex align-items-center ms-4"><span>@kel_durensawit</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="Impact/assets/img/logo.png" alt=""> -->
        <h1>Tumbuh Kembang<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>

          <li><a href="#contact">Contact</a></li>
          <li><a href="{{Route('login')}}">Login</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Selamat Datang Di <span>Tumbuh Kembang Duren Sawit</span></h2>
          {{-- <p>.</p> --}}
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started">Get Started</a>
            {{-- <a href="#" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="Impact/assets/img/checkklis.svg" class="img-fluid" alt="" width="85%" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    {{-- <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-easel"></i></div>
              <h4 class="title"><a href="" class="stretched-link">/</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-gem"></i></div>
              <h4 class="title"><a href="" class="stretched-link">.</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-geo-alt"></i></div>
              <h4 class="title"><a href="" class="stretched-link">.</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-command"></i></div>
              <h4 class="title"><a href="" class="stretched-link">.</a></h4>
            </div>
          </div><!--End Icon Box -->

        </div>
      </div>
    </div> --}}

    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Tentang Kami</h2>
          <p>.</p>
        </div>

        <div class="row gy-4">
          <h3>Gedung Dan Peta</h3>

          <div class="col-lg-6">
            <img src="Impact/assets/img/gedung.jpg" class="img-fluid rounded-4 mb-4" alt="">
            <p></p>
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
            
              </p>
              {{-- <ul>
                <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul> --}}
              {{-- <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
              </p> --}}

              <div class="position-relative mt-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31729.803827495558!2d106.90285978408404!3d-6.233980499113016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698cb62f8a90af%3A0x34c52b197e740df5!2sDuren%20Sawit%2C%20East%20Jakarta%20City%2C%20Jakarta!5e0!3m2!1sen!2sid!4v1644467049243!5m2!1sen!2sid" 
                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>
          </div>
          {{-- <div class="col-lg-12">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Pelayanan Kami
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> Pelayanan penerbitan dan perubahan data KK</li>
                <li><i class="bi bi-check-circle-fill"></i> Pencatatan Biodata Penduduk WNI</li>
                <li><i class="bi bi-check-circle-fill"></i> Pelayanan biodata penduduk yang belum memiliki NIK</li>
                <li><i class="bi bi-check-circle-fill"></i> Pelayanan KTP-el karena adanya perubahan data/biodata</li>
                <li><i class="bi bi-check-circle-fill"></i> Pelayanan KTP-el karena pindah data, hilang atau rusak</li>
                <li><i class="bi bi-check-circle-fill"></i> Pelayanan KTP-el bagi Penduduk WNI di luar domisili</li>
                <li><i class="bi bi-check-circle-fill"></i> Pelayanan perekaman KTP-el baru</li>
                <li><i class="bi bi-check-circle-fill"></i> Pelayanan Surat Keterangan Pindah Datang</li>
                <li><i class="bi bi-check-circle-fill"></i> Pelayanan Kartu Identitas Anak(KIA)</li>
                <li><i class="bi bi-check-circle-fill"></i> Pencatatan kelahiran dan kematian</li>
                <li><i class="bi bi-check-circle-fill"></i> Pendataan penduduk Non Permanen</li>
                
              </ul>
              <p>
                .
               </p>
            </div>
          </div> --}}
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Kontak</h2>
          <p>.</p>
        </div>

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-4">

            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Lokasi:</h4>
                  <p>Jakarta Jl. Kelurahan Raya No. 41</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>durensawit.oke@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-instagram flex-shrink-0"></i>
                <div>
                  <h4>Instagram :</h4>
                  <p>@kel_durensawit</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h4>Jam Oprasional:</h4>
                  <p>08.00-16.00 WIB</p>
                </div>
              </div><!-- End Info Item -->
            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Kirim Pesan</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>T. Kembang</span>
          </a>
          <p>.</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Tautan Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Kontak</a></li>
          </ul>
        </div>


        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Kontak Kami</h4>
          <p>
            Jam operasional 08.00-16.00 WIB <br>
            <strong>Instagram :</strong> @kel_durensawit<br>
            <strong>Email:</strong> durensawit.oke@gmail.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>T. Kembang</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="Impact/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Impact/assets/vendor/aos/aos.js"></script>
  <script src="Impact/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="Impact/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="Impact/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="Impact/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="Impact/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="Impact/assets/js/main.js"></script>

</body>

</html>