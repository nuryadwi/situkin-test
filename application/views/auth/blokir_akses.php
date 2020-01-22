<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title><?=$c_judul?> &mdash; <?=$site['name_app']?></title>
  <link href='<?php echo base_url("assets/img_app/$logo"); ?>' rel='shortcut icon' type='image/x-icon' />

  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/css/demo.css">
  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/css/style.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
              Halaman yang kamu cari tidak ditemukan.
            </div>
            <div class="page-search">
              <div class="mt-3">
                <a class="btn btn-primary btn-sm btn-round  " href="<?php echo base_url()?>">Kembali Ke Beranda</a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; Dwi Nuryadi 2019
        </div>
      </div>
    </section>
  </div>

  <script src="<?php echo base_url() ;?>assets/dist/modules/jquery.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/popper.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/tooltip.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/js/sa-functions.js"></script>
  
  <script src="<?php echo base_url() ;?>assets/dist/js/scripts.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/js/custom.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/js/demo.js"></script>
</body>
</html>