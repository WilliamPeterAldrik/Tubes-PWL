<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Input Surat Laporan Studi</title>

  <!-- CSS -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="#" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Laporan Hasil Studi</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <i class="mobile-nav-toggle "></i>
      </nav>
      <a class="btn-getstarted" href="#">Home</a>
    </div>
  </header>

  <main class="main mt-5">
    <section id="form1" class="form section text-center">
      <div class="container">
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="post" action="{{ route('laporan_hasil_studi.store') }}">
          @csrf
          <div class="form-group">
            <label for="nip">nip</label>
            <input type="text" name="nip" id="nip" maxlength="9" placeholder="e.g. 720001" class="form-control" value="{{ old('nip') }}" required >
            @error('nip')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama">nama</label>
            <input type="text" name="nama" id="nama" maxlength="150" placeholder="e.g. John Doe" class="form-control" value="{{ old('nama') }}" required>
            @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="keperluan">Keperluan</label>
            <input type="text" name="keperluan" id="keperluan" class="form-control" value="{{ old('keperluan') }}" required>
            @error('keperluan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>


@section('ExtraCSS')

@endsection

@section('ExtraJS')
  <script>
    $("#table-LaporanHasilStudi").DataTable({
      pageLength: 25,
    });
  </script>
@endsection