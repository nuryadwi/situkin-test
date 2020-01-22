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
            <table id="tables2" class="table table-bordered table-striped table-responsive " cellspacing="0" width="100%">
                   <thead>
                    <tr>
                      <th width="2%"> No.</th>
                      <th width="15%">NIP</th>
                      <th width="15%">NIK</th>
                      <th width="20%">Nama Lengkap</th>
                      <th width="15%">Jabatan</th>
                      <th class="none">email</th>
                      <!-- <th class="none">Golongan</th> -->
                      <th class="none">Foto</th>
                      <th class="none">Jenis Kelamin</th>
                      <th class="none">Alamat</th>
                      <th class="none">Tanggal daftar</th>
                      <th class="none">Terakhir Login</th>

                    </tr>
                </thead>
                    <tbody>
                      <?php
                          $i=1;
                          foreach ($pegawai as $pe) :
                            ?>
                            <tr>
                              <td style="vertical-align:middle"><?=$i++?></td>
                              <td style="vertical-align:middle"><?=$pe->nip?></td>
                              <td style="vertical-align:middle"><?=$pe->nik?></td>
                              <td style="vertical-align:middle"><?=$pe->full_name?></td>
                              <td style="vertical-align:middle"><?=$pe->nama_jabatan." ".$pe->nama_departemen?></td>
                              <td style="vertical-align:middle"><?=$pe->email?></td>
                              <!-- <td style="vertical-align:middle"><?=$pe->golongan?></td> -->
                              <td>
                              <img alt="images" class="rounded-circle" src="<?php echo base_url()?>assets/foto_profil/<?=$pe->images?>" width="40px">
                              </td>
                              <td style="vertical-align:middle"><?=$pe->gender?></td>
                              <td style="vertical-align:middle"><?=$pe->alamat?></td>
                              <td style="vertical-align:middle"><?=$pe->create_on?></td>
                              <td style="vertical-align:middle"><?=$pe->last_login?></td>
                            </tr>
                          <?php endforeach?>

                    </tbody>
                    </table>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>