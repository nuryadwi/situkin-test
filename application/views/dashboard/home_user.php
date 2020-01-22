<div class="row">
  <div class="col-lg-4 col-md-6 col-12">
      <div class="card card-sm-3">
        <div class="card-icon bg-primary">
          <i class="ion ion-paper-airplane"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Tugas Terkirim</h4>
          </div>
          <div class="card-body">
            <?php if (!empty($jml_tugas)){
              echo $jml_tugas;
            } else {
              echo'0';
            } ?>
          </div>
        </div>
      </div>
    </div>
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card card-sm-3">
      <div class="card-icon bg-info">
        <i class="ion ion-university"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Nilai</h4>
        </div>
        <div class="card-body">
          <?php if (!empty($nilai)){
            echo $nilai;
          } else {
            echo '0';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-12">
    <?php if ($ket ==='Mendapat Tunjangan'): ?>
    <div class="card card-sm-3">
      <div class="card-icon bg-success">
        <i class="ion ion-happy"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Reports</h4>
        </div>
        <div class="card-body">
          <p style="font-size: 14px"><?=$ket?></p>
        </div>
      </div>
    </div>
    <?php elseif(empty($nilai)): ?>
    <div class="card card-sm-3">
      <div class="card-icon bg-warning">
        <i class="ion ion-android-bulb"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Reports</h4>
        </div>
        <div class="card-body">
          <p style="font-size: 14px">Anda Belum Dinilai</p>
        </div>
      </div>
    </div>
    <?php else: ?>
      <div class="card card-sm-3">
      <div class="card-icon bg-danger">
        <i class="ion ion-sad"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Reports</h4>
        </div>
        <div class="card-body">
          <p style="font-size: 14px"><?=$ket?></p>
        </div>
      </div>
    </div>      
    <?php endif ?>

  </div>                  
</div>
<div class="row">
  <div class="col-lg-8 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
      </div>
      <div class="card-body">  
        <div style="text-align: center; height: 300px;">
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
        
        <div class="float-right">
            <div class="btn-group">
              <!-- <a href="<?php echo base_url().'bukupegawai'?>" class="btn btn-primary btn-sm"><span class="ion ion-paper-airplane"></span> Kirim Tugas</a> -->
              <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAdd" style="color: white;"><span class="ion ion-paper-airplane"></span> Kirim Tugas</a>
            </div>
          </div>
          <h4>Recent Tugas</h4>
      </div>
      <div class="card-body" style="overflow-y: auto; height: 260px">             
        <ul class="list-unstyled list-unstyled-border">
          <?php foreach (array_slice($buku,0,3) as $b): ?>
          <li class="media">
            
            <div class="media-body">
              <div class="float-right"><small><?=date_recent($b->create_at)?></small></div>
              <div class="media-title"><?=substr($b->tugas, 0,15)."..."?></div>
              <small><?=substr($b->ket, 0,100)."..."?></small>
            </div>
          </li>
          <?php endforeach ?>
        </ul>
      </div>
      <div class="text-center">
          <a href="<?php echo base_url()?>bukupegawai" class="btn btn-primary btn-sm btn-round">
            View All
          </a>
        </div>
    </div>
  </div>
</div>

