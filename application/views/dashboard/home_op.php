<div class="row">
    <div class="col-12 col-sm-4 col-lg-4">
        <div class="card card-sm-2">
          <div class="card-icon">
            <i class="ion ion-ios-paper text-danger"></i>
          </div>
          <div class="card-header">
            <h4>Tugas</h4>
          </div>
          <div class="card-body">
            <?=$jml3->tugas1?><span class="text-muted">/ <?=$jml3->tugas2?></span>
            <?php
              $persen1 = $jml3->tugas1/$jml3->tugas2*100;
            ?>
          </div>
          <div class="card-progressbar">
            <div class="progress" style="height: 6px;">
              <div class="progress-bar" role="progressbar" style="width: <?=$persen1?>%;"></div>
            </div>
          </div>
          <div class="card-footer">
            Jumlah tugas yang belum di approve bulan ini
          </div>
        </div>
    </div>

    <div class="col-12 col-sm-4 col-lg-4">
        <div class="card card-sm-2">
          <div class="card-icon">
            <i class="ion ion-android-done-all text-success"></i>
          </div>
          <div class="card-header">
            <h4>Pegawai</h4>
          </div>
          <div class="card-body">
            <?=$jml2->dinilai?> <span class="text-muted">/ <?=$jml2->total?></span>
            <?php
              $persen2 = $jml2->dinilai/$jml2->total*100;
            ?>
          </div>
          <div class="card-progressbar">
            <div class="progress" style="height: 6px;">
              <div class="progress-bar" role="progressbar" style="width: <?=$persen2?>%;"></div>
            </div>
          </div>
          <div class="card-footer">
            Jumlah Pegawai yang telah dinilai
          </div>
        </div>
    </div>

    <div class="col-12 col-sm-4 col-lg-4">
        <div class="card card-sm-2">
          <div class="card-icon">
            <i class="ion ion-ribbon-b text-warning"></i>
          </div>
          <div class="card-header">
            <h4>Pegawai</h4>
          </div>
          <div class="card-body">
           <?=$jml1->dapat?> <span class="text-muted">/ <?=$jml2->dinilai?></span>
           <?php 
            $persen3 = $jml1->dapat/$jml2->dinilai*100;
           ?>
          </div>
          <div class="card-progressbar">
            <div class="progress" style="height: 6px;">
              <div class="progress-bar" role="progressbar" style="width: <?=$persen3?>%;"></div>
            </div>
          </div>
          <div class="card-footer">
            Jumlah Pegawai yang mendapat tunjangan
          </div>
        </div>
    </div>
       
                    
</div>
<div class="row">
  <div class="col-lg-7 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Statistik Nilai Pegawai</h4>
      </div>
      <div class="card-body">
        <canvas id="myChart1" height="158"></canvas> 
        <div class="statistic-details mt-sm-4">
          <?php foreach ($kriteria as $k): ?>
            
          <ul>
            <li class="badge badge-primary" data-toggles="tooltip" title="<?=$k->nama_kriteria?>"><?=$k->kriteria?></li>
          </ul>
          <?php endforeach ?>

        </div>
        
      </div>
    </div>
  </div>
  <div class="col-lg-5 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Tugas Masuk</h4>
      </div>
      <div class="card-body" style="overflow-y: auto; height: 400px">             
        <ul class="list-unstyled list-unstyled-border">
        <?php if (!empty($recent)): ?>
          <?php foreach (array_slice($recent, 0,3) as $re): ?>
          <li class="media">
            <img class="mr-3 rounded-circle" width="50" src="<?php echo base_url()?>assets/foto_profil/<?=$re->images?>" alt="avatar">
            <div class="media-body">
              <div class="float-right"><small><?=date_recent($re->create_at)?></small></div>
              <div class="media-title"><?=$re->full_name?></div>
              <p><small><strong><?=substr($re->tugas, 0,20)."..."?></strong></small></p>
              <p><small><?=substr($re->ket, 0,100)."..."?></small></p>
              <?php if ($re->file_tambahan != 'kosong'): ?>
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="<?php echo base_url().'tugas/download/'.$re->id_tugas; ?>" class=""><i class="fa fa-paperclip"></i><?=$re->file_tambahan?></a>
              </p>
              <?php endif ?>
              <div class="text-right">
              <a href="<?=base_url();?>home/acc/1/<?=$re->id_tugas;?>" class="btn btn-primary btn-sm btn-round">Approve</a>
              </div>
            </div>
            <hr>
          </li>
          <?php endforeach ?>
          <?php else: ?>
            <p>...Belum ada tugas di upload bulan ini...</p>
          <?php endif ?> 
        </ul>
      </div>
      <div class="text-center">
          <a href="<?php echo base_url()?>tugasmasuk" class="btn btn-primary btn-sm btn-round">
            View All
          </a>
        </div>
    </div>
  </div>
</div>

