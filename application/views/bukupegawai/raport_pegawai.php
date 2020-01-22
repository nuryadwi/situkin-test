<section class="section">
  <div class="section-header">
    <!-- <div><?=$c_des?></div>
    <br><span><h6>Bulan <?=bulan(date('m'))?>&nbsp;Tahun&nbsp;<?=date('Y')?> </h6></span> -->
    <div class="row">
      <div class="col-md-3" style="text-align: center;">
        <img src="<?php echo base_url(); ?>assets/img_app/<?=$logo?>" style="width: 100px; height: 100px;">
      </div>
      <div class="col-md-8" style="text-align: center;">
        <h5>Penilaian Prestasi Kerja</h5>
        <h5>Pegawai Kantor Kelurahan Desa Sidomulyo</h5>
        <p style="line-height: 0.7;font-size: 11px;font-family:Arial;font-weight: normal;">Alamat: Kantor Desa Sidomulyo Plebengan, Sidomulyo, Bambanglipuro, Bantul, Yogyakarta.<i class="fa fa-phone">&nbsp;0811-2651-333</i>&nbsp;<i class="fa fa-at">&nbsp;desa.sidomulyo@bantulkab.go.id</i></p>
        
      </div>
    </div>
  </div>
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
                   
          </div>
          <div class="card-body p-3">
             <pre style="font-family: Montserrat;font-size: 13px;"><b>NIP</b>                         :<?=$nip?>
                <br><b>Nama</b>                    :<?=$nama?>
                <br><b>Jabatan</b>                :<?=$jabatan?>
                <br><b>Unit Organisasi</b> :<?=$instansi?>
            </pre>
            <div class="col-xs-12 table">
              <table class="table table-striped table-bordered table-responsive">
                <thead>
                  <tr>
                    <th width="80%" colspan="5" style="text-align: center;">Unsur yang dinilai</th>
                    <th colspan="6">Hasil</th>
                  </tr>
                </thead>
                <thead>
                  <tr>          
                    <th width="5%">No.</th>
                    <th style="width: 20%">Kriteria</th>
                    <th style="width: 40%">Deskripsi</th>
                    <th width="10%">Penilaian</th>
                    <th style="width: 10%">Nilai</th>
                    <th style="background: grey;"></th>        
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                  foreach ($kriteria as $krit): ?>
                  <tr>
                    <td><?=$i++;?></td>
                    <td><?=$krit->nama_kriteria;?></td>
                    <td><?=$krit->deskripsi?></td>
                    <?php
                     $id = $this->session->userdata('id_user');
                     //load table
                     $this->db->select('*');
                     $this->db->from('t_alternatif');
                     $this->db->join('t_alternatif_kriteria','t_alternatif.id_alternatif=t_alternatif_kriteria.id_alternatif');
                     $this->db->join('t_nilai_awal','t_alternatif_kriteria.id_kriteria=t_nilai_awal.id_kriteria');
                     $this->db->where('t_alternatif.id_user', $id);
                     $this->db->where('t_alternatif_kriteria.id_kriteria', $krit->id_kriteria);
                     $this->db->group_by('nilai_alternatif_kriteria');
                     $query = $this->db->get();
                     $nilai = $query->result();
                      foreach ($nilai as $n) :
                    ?>
                    <td><?=$n->nilai_awal?></td>
                    <td><?=round($n->nilai_alternatif_kriteria,2)?></td>
                    <?php endforeach?>
                    <?php if (empty($nilai)): ?>
                    <td>-</td>
                    <td>-</td>
                  <?php endif ?>
                  <td style="background: grey;"></td>
                  </tr>
                </tbody>
                <?php endforeach ?>
                <thead>
                  <tr>
                    <th colspan="5"width="80%" style="text-align: center;">Nilai setelah dihitung menggunakan Metode SMART</th>
                    
                    <!-- dilakukan if jika hasilnya kosong maka nilai tidak tampil -->
                    <?php if (!empty($nilai)) { ?>
                      <td colspan="5"><?=$n->hasil_alternatif?></td>
                    <?php }else{ ?>
                      <td>-</td>
                    <?php }?>
                  </tr>
                </thead>
              </table>
              
                  <?php if ($keterangan ==='Mendapat Tunjangan'): ?>
                    <div class="alert alert-success alert-has-icon">
                      <div class="alert-icon"><i class="ion-happy"></i></div>
                        <div class="alert-body">
                        <div class="alert-title">Selamat!</div>
                        <p><?=$keterangan?></p>
                        </div>
                    </div>
                    <?php elseif(empty($n->hasil_alternatif)): ?>
                      <div class="alert alert-secondary alert-has-icon">
                        <div class="alert-icon"><i class="ion-sad"></i></div>
                        <div class="alert-body">
                        <div class="alert-title">Maaf Belum Dilakukan Penilaan kepada anda</div>
                        <p><?=$keterangan?></p>
                        </div>
                      </div>
                    <?php else: ?>
                    <div class="alert alert-danger alert-has-icon">
                      <div class="alert-icon"><i class="ion-sad"></i></div>
                        <div class="alert-body">
                        <div class="alert-title">Maaf!</div>
                        <p><?=$keterangan?></p>
                        </div>
                    </div>
                  <?php endif ?>

                  
              
            </div>
            <div class="col-xs-12">
              <?php if (!empty($nilai)): ?>
                <a href="<?php echo base_url()?>cetakraport" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Cetak ke PDF</a>
              <?php endif ?> 
            </div>
          </div>
          <!-- end body-->
        </div>
      </div>
    </div>
  </div>
</section>