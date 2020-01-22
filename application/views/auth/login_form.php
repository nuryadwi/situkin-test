<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>SI-TUKIN &rsaquo; Login</title>

  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/modules/toastr/build/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/css/demo.css">
  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/css/style.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              SI-TUKIN
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
              <div class="card-body">
                <form method="POST" action="<?php echo base_url()?>login" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Silahkan masukkan username anda
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password" class="d-block">Password</label>
                    <div class="input-group">
                      <input id="password" type="password" class="form-control pwd" name="password" tabindex="2" required>
                      <span class="input-group-btn">
                          <button class="btn btn-default reveal" type="button" data-toggles="tooltip" title="Show Password"><i class="ion ion-eye"></i></button>
                      </span>
                      <div class="invalid-feedback">
                        please fill in your password
                      </div>
                   </div>

                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" tabindex="4"><i class="ion ion-log-in"></i>&nbsp;Login</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Dwi Nuryadi 2019
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="<?php echo base_url() ;?>assets/dist/modules/jquery.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/popper.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/tooltip.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>

  <script src="<?php echo base_url() ;?>assets/dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/js/sa-functions.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/toastr/build/toastr.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/js/scripts.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/js/custom.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/js/demo.js"></script>

  <script type="text/javascript">
    <?php if($this->session->flashdata('msg') =='error'): ?>
      toastr.error('Username atau password salah','Gagal!');
    <?php elseif($this->session->flashdata('msg') =='warning'): ?>
      toastr.warning('Username atau password tidak ditemukan','Maaf!');
    <?php elseif($this->session->flashdata('msg') =='success-logout'): ?>
      toastr.info('Anda Telah Keluar dari aplikasi','Info!');
    <?php else: ?>
  
    <?php endif;?>
  </script>
</body>
</html>