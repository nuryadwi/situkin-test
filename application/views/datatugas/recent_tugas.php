<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div>
  </h1>
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
              <button id="btn-show-all-data" type="button" class="btn btn-info btn-sm"><i class="ion ion-arrow-down-a"></i>&nbsp;Tampil Semua</button>
              <button id="btn-hide-all-data" type="button" class="btn btn-danger btn-sm"><i class="ion ion-arrow-up-a"></i>&nbsp;Tutup Semua</button> 
                </div>
                <div class="card-body p-3">
                    <table id="tables2" class="table table-bordered table-striped table-responsive" cellspacing="0" width="100%">
                       <thead>
                        <tr>
                          <th width="2%" style="text-align: center;">No</th>
                          <th width="15%" style="text-align: center;">Nama Pegawai</th>
                          <th width="5%" style="text-align: center;">Jabatan</th>
                          <th width="15%" style="text-align: center;">Tugas</th>
                          <th width="10%" style="text-align: center;">Tanggal Masuk</th>
                          <th class="none">Tanggal</th>
                          <th class="none">Pemberi Tugas</th>
                          <th class="none">File Tambahan</th>
                          <th class="none">Keterangan</th>
                          <th width="10%" style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $i=1;
                      foreach ($recent as $re): ?>          
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$re->full_name?></td>
                        <td></td>
                        <td><?=$re->tugas?></td>
                        <td><?=date_recent($re->create_at)?></td>
                        <td><?=date_indo($re->tanggal)?></td>
                        <td><?=$re->pemberi_tugas?></td>
                        <td>
                        <?php if ($re->file_tambahan != 'kosong'): ?>
                        <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                            <a href="<?php echo base_url().'tugas/download/'.$re->id_tugas; ?>" class=""><i class="fa fa-paperclip"></i><?=$re->file_tambahan?></a>
                        <?php endif?>
                        </td>
                        <td><?=$re->ket?></td>
                        <td>
                          <a href="<?=base_url();?>tugas/approve/1/<?=$re->id_tugas;?>" class="btn btn-primary btn-sm btn-round" data-toggles="tooltip" title="Approve Tugas">Approve</a>
                        </td>
                      </tr>
                     <?php endforeach ?> 
                    </tbody>
                    </table>
                </div>
        </div>
      </div>
    </div>
  </div>
</section>