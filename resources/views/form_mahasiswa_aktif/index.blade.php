<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Form Mahasiswa Aktif/title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  

  <!-- =======================================================
  * Template Name: OnePage
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Form Mahasiswa Aktif</h1>
      </a>

      <!-- Navbar -->
      <nav id="navmenu" class="navmenu">
        <i class="mobile-nav-toggle "></i>
      </nav>

      <a class="btn-getstarted" href="index.html">Home</a>
      <li class="nav-item"><a href="{{ route('form_mahasiswa_aktif-list') }}">Form Mahasiswa Aktif</a></li>

    </div>
  </header>

  <main class="main">

    <!-- Form Section -->
    <section id="form1" class="form section text-center">
        <div class="table-responsive d-flex justify-content-center">
            
            <table class="table align-middle table-bordered w-auto">
                <thead>
                    <tr>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">NRP</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Alamat Lengkap</th>
                        <th scope="col">Keperluan Pengajuan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <!-- Table Content -->
                @foreach ($form_mahasiswa_aktifs as $form_mahasiswa_aktif)
                <tr>
                  <td>{{ $form_mahasiswa_aktif->nama }}</td>
                  <td>{{ $form_mahasiswa_aktif->nip }}</td>
                  <td>{{ $form_mahasiswa_aktif->semester }}</td>
                  <td>{{ $form_mahasiswa_aktif->alamat_lengkap }}</td>
                  <td>{{ $form_mahasiswa_aktif->keperluan }}</td>
                  <td><div class="form-button-action">
                          <button
                              data-bs-toggle="tooltip"
                              title="Edit Form"
                              class="btn btn-link btn-primary edit-data"
                              data-original-title="Edit Form"
                              data-url="{{ route('form_mahasiswa_aktif-edit', [$form_mahasiswa_aktif->id_form_mahasiswa_aktif]) }}"
                          >
                            <i class="fa fa-edit"></i>
                          </button>
                          <form method="post" action="{{ route('form_mahasiswa_aktif-delete', [$form_mahasiswa_aktif->id_form_mahasiswa_aktif]) }}">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                data-bs-toggle="tooltip"
                                title="Delete Form"
                                class="btn btn-link btn-danger delete-data"
                                data-original-title="Remove Form"
                            >
                              <i class="fa fa-times"></i>
                            </button>
                          </form>
                        </div>
                      </td>
                </tr>
                
                @endforeach
                </tbody>
            </table>
        </div>
    </section><!-- /Form Section -->



  </main>



  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>