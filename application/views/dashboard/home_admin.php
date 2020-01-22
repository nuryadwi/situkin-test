<div class="row">
  <div class="col-12 col-sm-4 col-lg-4">
      <div class="card card-sm-2">
        <div class="card-icon">
          <i class="ion ion ion-android-checkmark-circle text-warning"></i>
        </div>
        <div class="card-header">
          <h4>Pengguna Status Aktif</h4>
        </div>
        <div class="card-body">
          <?=$jml_aktif->jml_aktif?><span class="text-muted">/ <?=$jml_user->jml_user?></span>
          <?php
            $persen1 = $jml_aktif->jml_aktif/$jml_user->jml_user*100;
          ?>
        </div>
        <div class="card-progressbar">
          <div class="progress" style="height: 6px;">
            <div class="progress-bar bg-warning" role="progressbar" data-toggles="tooltip" title="<?=$persen1?>%" style="width: <?=$persen1?>%;"></div>
          </div>
        </div>
        <div class="card-footer">
          Jumlah pengguna aktif
        </div>
      </div>
  </div>
  <div class="col-12 col-sm-4 col-lg-4">
      <div class="card card-sm-2">
        <div class="card-icon">
          <i class="ion ion-android-wifi text-success"></i>
        </div>
        <div class="card-header">
          <h4>Online Users</h4>
        </div>
        <div class="card-body">
          <?=$jml_online->jml_online?><span class="text-muted">/ <?=$jml_user->jml_user?></span>
          <?php $persen = $jml_online->jml_online/$jml_user->jml_user*100;?>
        </div>
        <div class="card-progressbar">
          <div class="progress" style="height: 6px;">
            <div class="progress-bar bg-success" role="progressbar" data-toggles="tooltip" title="<?=$persen?>%" style="width: <?=$persen?>%;"></div>
          </div>
        </div>
        <div class="card-footer">
         Jumlah pegawai sedang online saat ini
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-4 col-lg-4">
      <div class="card">
        <div class="card card-sm-3">
          <div class="card-icon bg-primary">
            <i class="ion ion-ios-people"></i>
          </div>
          <div class="card-wrap ">
            <div class="card-header">
              <h4>Total Pengguna</h4>
            </div>
            <div class="card-body">
              <?=$jml_user->jml_user?>
            </div>
          </div>
        </div>
       <div class="card-footer text-muted" style="font-size: 12px">
          Jumlah Pengguna yang terdaftar
        </div>
      </div>
      </div>             
</div>
<div class="row">
  <div class="col-lg-8 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
      </div>
      <div class="card-body">
        <div style="text-align: center; height: 295px;">
              <div>
                <!-- load logo image -->
                <img src="<?php echo base_url("assets/img_app/$logo"); ?>"
                style="width: 100px; height: 100px;">
              </div>
              <h5>
                <label>Sistem Penilaian Kinerja<br>
                Pegawai Kantor Kelurahan Desa Sidomulyo</label>

                <p><small style="font-size: 12px;">Alamat: Kantor Desa Sidomulyo Plebengan, Sidomulyo, Bambanglipuro, Bantul, Yogyakarta<br>
                <i class="fa fa-phone">&nbsp;0811-2651-333</i>&nbsp;<i class="fa fa-at">&nbsp;desa.sidomulyo@bantulkab.go.id</i></small></p>
              </h5>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Pengguna</h4>
      </div>
      <div class="card-body" style="overflow-y: auto; height: 270px">             
        <ul class="list-unstyled list-unstyled-border">
          <?php foreach (array_slice($pengguna, 0,3) as $p): ?>
          <li class="media">
            <img class="mr-3 rounded-circle" width="50" src="<?php echo base_url()?>assets/foto_profil/<?=$p->images?>" alt="avatar">
            <div class="media-body">
              <div class="float-right"><small><?=date_recent($p->create_on)?></small></div>
              <div class="media-title"><?=$p->username?></div>
              <small>
                <p class="text-muted">
                Nama :<?=$p->full_name?><br>
                Level : <?=$p->nama_role?><br>
              </p>
              </small>
            </div>
          </li>
          <?php endforeach ?>

        </ul>
      </div>
      <div class="text-center">
          <a href="<?php echo base_url()?>user" class="btn btn-primary btn-sm btn-round">
            View All
          </a>
        </div>
    </div>
  </div>
</div>