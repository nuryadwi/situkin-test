<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div> <br>
    <a class="btn btn-success btn-sm btn-round" data-toggle="modal" data-target="#ModalAdd"><span class="ion ion-plus"></span> Tambah Kriteria</a> 
  </h1>
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card card-primary">
            <div class="card-header">
              <h4>Tabel 1.Normalisasi Bobot Kriteria dari Paling Penting</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Kriteria</th>
                      <th>Bobot</th>
                      <th>Normalisasi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i = 1;
                    foreach ($krit as $k1) :
                    ?>
                     <tr>
                       <td scope="row"><?=$i++; ?></td>
                       <td><?=$k1->kriteria; ?></td>
                       <td><?=$k1->bobot1; ?></td>
                       <td><?=round($k1->norm1,3); ?></td>
                       <td style="text-align: center;">
                         <a class="btn btn-danger btn-action mr-1" data-toggle="modal" data-target="#ModalHapus<?=$k1->id_kriteria;?>" data-toggles="tooltip" title="Hapus Kriteria"><span class="ion ion-trash-b"></span></a>
                       </td>
                     </tr>
                   <?php endforeach?>
                     <tr>
                       <td colspan="2" style="text-align: center;">Jumlah</td>
                        <td><b><?=$jml1->bobot_norm_1?></b></td>                      
                        <td colspan="4"></td>
                     </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <a href="<?=base_url();?>kriteria/norm1" class="btn btn-primary btn-sm" data-toggles="tooltip" title="Normalisasi" onclick="return confirm('Apakah kamu yakin akan melakukan normalisasi?');"><i class="ion ion-ios-gear"></i></a>
             <a href="<?=base_url();?>kriteria/kosongkan_norm1" class="btn btn-warning btn-sm" data-toggles="tooltip" title="Kosongkan" onclick="return confirm('Apakah kamu yakin akan mengosongkan hasil normalisasi?');"><i class="ion ion-refresh"></i></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>Tabel 2.Normalisasi Bobot Kriteria dari Tidak Penting</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <th>#</th>
                    <th>Kriteria</th>
                    <th>Bobot</th>
                    <th>Normalisasi</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($krit as $k2) :
                    ?>
                    <tr>
                      <td scope="row"><?=$i++; ?></td>
                      <td><?=$k2->kriteria; ?></td>
                      <td><?=$k2->bobot2; ?></td>
                      <td><?=round($k2->norm2,3); ?></td>
                      <td style="text-align: center;">
                         <a class="btn btn-danger btn-action mr-1" data-toggle="modal" data-target="#ModalHapus<?=$k2->id_kriteria;?>" data-toggles="tooltip" title="Hapus Kriteria"><span class="ion ion-trash-b"></span></a>
                       </td>
                    </tr>
                  <?php endforeach?>
                    <tr>
                       <td colspan="2" style="text-align: center;">Jumlah</td>
                        <td><b><?=$jml2->bobot_norm_2?></b></td>                      
                        <td colspan="4"></td>
                     </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
             <a href="<?=base_url();?>kriteria/norm2" class="btn btn-primary btn-sm" data-toggles="tooltip" title="Normalisasi" onclick="return confirm('Apakah kamu yakin akan melakukan normalisasi?');"><i class="ion ion-ios-gear"></i></a>
             <a href="<?=base_url();?>kriteria/kosongkan_norm2" class="btn btn-warning btn-sm" data-toggles="tooltip" title="Kosongkan" onclick="return confirm('Apakah kamu yakin akan mengosongkan hasil normalisasi?');"><i class="ion ion-refresh"></i></a>

            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Tabel Normalisasi Bobot Kriteria Rata-rata</h4>
              <a href="<?=base_url();?>kriteria/rerata" class="btn btn-primary" data-toggles="tooltip" title="Dapatkan bobot rata-rata" onclick="return confirm('Apakah kamu yakin?');" ><i class="ion ion-gear-a"></i> Generate</a>
            </div>
            <div class="card-body p-4">
              <table id="tables" class="table table-bordered table-striped table-responsive">
                  <thead>
                    <tr>
                      <th width="2%">No.</th>
                      <th width="5%">Kode</th>
                      <th width="15%">Nama Kriteria</th>
                      <th width="10%">Bobot Rerata</th>
                      <th width="20%">Deskripsi</td>
                      <th width="5%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($rerata as $r) :
                    ?>
                    <tr>
                      <td scope="row"><?=$i++;?></td>
                      <td><?=$r->kriteria;?></td>
                      <td><?=$r->nama_kriteria?></td>
                      <td><?=round($r->bobot_rerata,3);?></td>
                      <td><?=$r->deskripsi?></td>
                      <td style="text-align: center;">
                        <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#ModalEdit<?=$r->id_kriteria;?>" data-toggles="tooltip" title="Edit"><span class="ion ion-android-create"></span></a>
                      </td> 
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

<!-- modal add -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Tambah Kriteia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'kriteria/simpan'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body" style="height: 400px;">
            <div class="row">
              <div class="form-group col-lg-4">
                <label for="inputKodeKriteria">Kode Kriteria</label>
                  <input id="inputKodeKriteria" placeholder="Kode Kriteria" type="text" class="form-control" name="kriteria" autofocus >
              </div>
              <div class="form-group col-lg-8">
                <label for="inputNamaKriteria">Nama Kriteria</label>
                  <input id="inputNamaKriteria" placeholder="Nama Kriteria" type="text" class="form-control" name="nama_kriteria" autofocus >
              </div>
            </div>
            <div class="form-group">
              <label for="inputDeskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" placeholder='Deskripsi'></textarea>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="inputNilaiPertama">Nilai Kriteria Pertama</label>
                  <input id="inputNilaiPertama" type="number" name="bobot1" class="form-control" autofocus >
                  <label style="color: red;"><small>(*) Angka</small></label>
              </div>
              <div class="form-group col-lg-6">
                <label for="inputNilaiKedua">Nilai Kriteia Kedua</label>
                  <input id="inputNilaiKedua" type="number" class="form-control" name="bobot2" autofocus >
                  <label style="color: red;"><small>(*) Angka</small></label>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-sm" id="simpan">Simpan</button>
        </div>
      </form>
      </div>
    </div>
</div>

<?php foreach ($krit as $k): ?>
<!--modal Hapus kriteria-->
<div class="modal fade" id="ModalHapus<?=$k->id_kriteria?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Hapus Kriteria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'kriteria/delete'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <input type="hidden" name="id_kriteria" value="<?php echo $k->id_kriteria;?>"/>
             <p>Apakah Anda yakin mau menghapus kriteria: <b><?=$k->kriteria?>|&nbsp;<?=$k->nama_kriteria;?></b> ?</p>
          </div>
          <!-- end modal body-->
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-sm" id="simpan">Hapus</button>
        </div>
      </form>
      </div>
    </div>
</div>
  
<!--modal Edit kriteria-->
<div class="modal fade" id="ModalEdit<?=$k->id_kriteria?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Edit Kriteria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'kriteria/update'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <div class="form-group">
               <input type="hidden" name="id_kriteria" value="<?=$k->id_kriteria?>">
                <label for="inputNamaKriteria">Nama Kriteria</label>
                  <input id="inputNamaKriteria" placeholder="Nama Kriteria" type="text" class="form-control" name="nama_kriteria" value="<?=$k->nama_kriteria?>" autofocus >
              </div>
            <div class="form-group">
              <label for="inputDeskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" placeholder='Deskripsi'><?=$k->deskripsi?></textarea>
            </div>
          </div>
          <!-- end modal body-->
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-sm" id="simpan">Update</button>
        </div>
      </form>
      </div>
    </div>
</div>
<?php endforeach ?>
