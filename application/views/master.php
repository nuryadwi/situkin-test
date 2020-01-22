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
  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/modules/toastr/build/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/css/demo.css">
  <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/css/style.css">

   <!-- Datatables -->
   <link href="<?php echo base_url() ;?>assets/dist/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
   <link href="<?php echo base_url() ;?>assets/dist/modules/datatables/Responsive-2.2.1/css/responsive.bootstrap4.min.css" rel="stylesheet">
   <link href="<?php echo base_url() ;?>assets/dist/modules/datatables/FixedColumns-3.3.0/css/fixedColumns.bootstrap4.min.css" rel="stylesheet">
   <link href="<?php echo base_url() ;?>assets/dist/modules/datatables/FixedColumns-3.3.0/css/fixedColumns.dataTables.min.css" rel="stylesheet">
   <!-- date picker -->
   <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/modules/datepicker/datepicker3.css">
   <link rel="stylesheet" href="<?php echo base_url() ;?>assets/dist/modules/timepicker/bootstrap-timepicker.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets/dist/modules/loading-bar/loading-bar.css"/>
    
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <!-- nav header-->
      <?php $this->load->view('layout/nav-header')?>
      <!-- end-->
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href=""><?=$site['name_app']?></a>
          </div>
          <div class="sidebar-user">
            <div class="sidebar-user-picture">
              <img alt="image" src="<?php echo base_url() ?>assets/foto_profil/<?php echo $this->session->userdata('images'); ?>">
            </div>
            <div class="sidebar-user-details">
              <div class="user-name"><?php echo strtoupper($this->session->userdata('full_name')); ?></div>
              <div class="user-role">
                <?php echo $this->session->userdata('nama_role')?>
              </div>
            </div>
          </div>
          <!-- sidebar -->
          <?php $this->load->view('layout/sidebar')?>
          <!-- end-->
        </aside>
      </div>
      <!-- content -->
      <div class="main-content">
        <?php echo $contents?>
      </div>
      <!-- end -->

      <!-- footer-->
      <footer class="main-footer">
        <?php $this->load->view('layout/footer')?>
      </footer>
      <!-- footer-->
    </div>
  </div>

  <script src="<?php echo base_url() ;?>assets/dist/modules/jquery.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/popper.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/tooltip.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/js/sa-functions.js"></script>
  
  <script src="<?php echo base_url() ;?>assets/dist/modules/chart.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ;?>assets/dist/modules/loading-bar/loading-bar.js"></script>
  
  <!-- summernotes 
  untuk membuat compose draft
  -->
 
  <!-- datatables -->
  <script src="<?php echo base_url() ;?>assets/dist/modules/datatables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/datatables/Responsive-2.2.1/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/datatables/Responsive-2.2.1/js/responsive.bootstrap4.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/datatables/FixedColumns-3.3.0/js/dataTables.fixedColumns.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/datatables/FixedColumns-3.3.0/js/fixedColumns.bootstrap4.min.js"></script>
	
  <script src="<?php echo base_url() ;?>assets/dist/js/scripts.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/js/custom.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/js/demo.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/toastr/build/toastr.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/datepicker/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/timepicker/bootstrap-timepicker.min.js"></script>


  <!--NOTIFIKASI-->
  <script type="text/javascript">
    <?php if($this->session->flashdata('msg')=='success'):?>
        toastr.success('Data telah tersimpan','Sukses!');
    <?php elseif($this->session->flashdata('msg') =='error'): ?>
      toastr.error('Data Gagal Tersimpan','Gagal!');
    <?php elseif($this->session->flashdata('msg') =='warning'): ?>
      toastr.warning('Data Tidak Cocok','Awas!');
    <?php elseif($this->session->flashdata('msg') =='warning-duplicate-nip'): ?>
      toastr.warning('Maaf NIP sudah dipakai.','Perhatian!');
    <?php elseif($this->session->flashdata('msg') =='warning-duplicate'): ?>
      toastr.warning('Maaf Data sudah ada.','Perhatian!');
    <?php elseif($this->session->flashdata('msg') =='warning-pegawai'): ?>
      toastr.warning('Pegawai Sudah Ada. Silahkan masukkan Pegawai yang belum di masukkan','Maaf!');
    <?php elseif($this->session->flashdata('msg') =='info'): ?>
      toastr.warning('Data Tidak Ditemukan','Info');
    <?php elseif($this->session->flashdata('msg') =='success-login'): ?>
      toastr.success('Selamat datang di Aplikasi Sistem Tunjangan Kinerja Desa Sidomulyo.','Halo!');
    <?php elseif($this->session->flashdata('msg') =='success-hapus'): ?>
      toastr.success('Data Berhasil di hapus','Sukses');
    <?php elseif($this->session->flashdata('msg') =='success-update'): ?>
      toastr.success('Data Berhasil dirubah','Sukses');
    <?php elseif($this->session->flashdata('msg') =='success-normalisasi'): ?>
      toastr.success('Bobot Kriteria Telah Di normalisasi','Sukses');
    <?php elseif($this->session->flashdata('msg') =='success-kosongkan'): ?>
      toastr.success('Bobot Kriteria Berhasil Dikosongkan','Sukses');
    <?php elseif($this->session->flashdata('msg') =='success-rerata'): ?>
      toastr.success('Berhasil mendapatkan bobot rata-rata kriteria','Sukses');
    <?php elseif($this->session->flashdata('msg') =='success-ganti-password'): ?>
      toastr.success('Password Berhasil Di ganti. Silahkan login ulang dengan password baru anda','Sukses!');
    <?php elseif($this->session->flashdata('msg')=='show-modal'):?>
      $('#ModalResetPassword').modal('show');
    <?php else: ?>
  
    <?php endif;?>
  </script>
  <!-- END NOTIFIKASI-->
<?php if ($this->session->userdata('id_role')==='6'): ?>
  <script type="text/javascript">
    $(document).ready(function(){
      var ctx = document.getElementById("myChart1").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: [
            <?php
             foreach ($kriteria as $krit) {
             ?>
             "<?=$krit->kriteria?>",
             <?php 
              }
            ?>
            ],
            datasets: [{
              label: 'Nilai rata-rata',
              data: [
            <?php foreach ($kriteria as $k1): ?>
            
              <?php
                $this->db->select_avg('nilai_alternatif_kriteria', 'rata');
                $this->db->from('t_alternatif_kriteria');
                $this->db->join('t_kriteria', 't_alternatif_kriteria.id_kriteria=t_alternatif_kriteria.id_kriteria');
                $this->db->where('t_alternatif_kriteria.id_kriteria',$k1->id_kriteria);
                $q = $this->db->get()->result();
                foreach ($q as $n) : ?>
                  <?php echo $n->rata.',';?>
                <?php endforeach?>
             <?php endforeach ?>
              ],
              borderWidth: 2,
              backgroundColor: 'rgb(87,75,144)',
              borderColor: 'rgb(87,75,144)',
              borderWidth: 2.5,
              pointBackgroundColor: '#ffffff',
              pointRadius: 4
            }]
          },
          options: {
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                  stepSize: 10
                }
              }],
              xAxes: [{
                gridLines: {
                  display: true
                }
              }]
            },
          }
        });
    });
</script>
<?php endif ?>

</body>
</html>