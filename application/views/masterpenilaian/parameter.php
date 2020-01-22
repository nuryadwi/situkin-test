<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div>
  </h1>
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header card-primary">
          
          </div>
          <div class="card-body p-3">
                <table id="tables" class="table table-bordered table-striped table-responsive">
                       <thead>
                        <tr>
                          <th width="2%">No</th>
                          <th width="20%">Nama Kriteria</th>
                          <th width="5%">Minimal</th>
                          <th width="5%">Maksimal</th>
                          <th width="10%">Tipe</th>
                          <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      foreach ($krit as $p):
                      ?>                
                      <tr>
                        <td style="vertical-align:middle"><?=$i++;?></td>
                        <td style="vertical-align:middle"><?=$p->kriteria.': '.$p->nama_kriteria?></td>
                        <td style="text-align: center;"><?=$p->min?></td>
                        <td style="text-align: center;"><?=$p->maks?></td>
                        <td style="vertical-align:middle"><?=rename_string_tipe($p->type)?></td>
                        <td style="text-align: center;">
                          
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#ModalEdit<?=$p->id_kriteria?>" data-toggles="tooltip" title="Edit"><span class="ion ion-edit"></span></a>

                            <a class="btn btn-danger btn-action mr-1" data-toggle="modal" data-target="#ModalHapus<?=$p->id_kriteria?>" data-toggles="tooltip" title="Hapus"><span class="ion ion-trash-b"></span></a>
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

<?php foreach ($krit as $p): ?>

<div class="modal fade" id="ModalEdit<?=$p->id_kriteria?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Tambah Nilai Parameter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'parameter/simpan'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <input type="hidden" name="id_kriteria" value="<?php echo $p->id_kriteria;?>"/>
            
            <div class="form-group">
              <label for="inputNamaKriteria">Nama Kriteria</label>
                <input id="inputNamaKriteria" type="text" class="form-control" value="<?=$p->nama_kriteria?>" autofocus disabled >
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="inputNilaiMin">Minimal</label>
                  <input id="inputKodeMin" type="number" name="min" class="form-control" value="<?=$p->min?>" autofocus >
                  <label style="color: red;"><small>(*) Angka</small></label>
              </div>
              <div class="form-group col-lg-6">
                <label for="inputNilaiMaks">Maksimal</label>
                  <input id="inputNilaiMaks" type="text" class="form-control" name="maks" value="<?=$p->maks?>" autofocus >
                  <label style="color: red;"><small>(*) Angka</small></label>
              </div>
            </div>
            <div class="form-group">
              <label for="inputTipe">Tipe Kriteria</label>
                <select name="type" class="form-control" value="<?=$p->type?>">
                  <option disabled selected>--Pilih Tipe--</option>
                  <option value="1"<?php if($p->type == 1) { echo "selected";}?>>Benefit Criteria</option>
                  <option value="2"<?php if($p->type == 2) { echo "selected";}?>>Cost Criteria</option>
                </select>
            </div>

          </div>
          <!-- end modal body-->
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-sm" id="simpan">Simpan</button>
        </div>
      </form>
      </div>
    </div>
</div>

<!--modal Hapus-->
<div class="modal fade" id="ModalHapus<?=$p->id_kriteria?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Hapus Nilai Parameter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'parameter/delete'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <input type="hidden" name="id_kriteria" value="<?php echo $p->id_kriteria;?>"/>
             <p>Apakah Anda yakin mau menghapus nilai parameter dari kriteria&nbsp;<b><?=$p->nama_kriteria;?></b>?</p>
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

<?php endforeach ?>
