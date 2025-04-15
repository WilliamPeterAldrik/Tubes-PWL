<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Input Surat Laporan Studi</title>

  <!-- CSS -->
  <link href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/aos/aos.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/css/main.css')); ?>" rel="stylesheet">
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
        <?php if(session('success')): ?>
          <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <form method="post" action="<?php echo e(route('laporan_hasil_studi.store')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label for="nip">nip</label>
            <input type="text" name="nip" id="nip" maxlength="9" placeholder="e.g. 720001" class="form-control" value="<?php echo e(old('nip')); ?>" required >
            <?php $__errorArgs = ['nip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="form-group">
            <label for="nama">nama</label>
            <input type="text" name="nama" id="nama" maxlength="150" placeholder="e.g. John Doe" class="form-control" value="<?php echo e(old('nama')); ?>" required>
            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="form-group">
            <label for="keperluan">Keperluan</label>
            <input type="text" name="keperluan" id="keperluan" class="form-control" value="<?php echo e(old('keperluan')); ?>" required>
            <?php $__errorArgs = ['keperluan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>

  <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
</body>
</html>


<?php $__env->startSection('ExtraCSS'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('ExtraJS'); ?>
  <script>
    $("#table-LaporanHasilStudi").DataTable({
      pageLength: 25,
    });
  </script>
<?php $__env->stopSection(); ?><?php /**PATH C:\Users\william\Downloads\Tubes-PWL-main(2)\Tubes-PWL-main\resources\views/laporan_hasil_studi/create.blade.php ENDPATH**/ ?>