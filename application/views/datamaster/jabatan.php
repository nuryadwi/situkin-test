<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div>
  </h1>
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalAdd"><span class="ion ion-plus"></span> Tambah Jabatan</a>
                </div>
                <div class="card-body p-3">
                    <table id="tables" class="table table-bordered table-striped table-responsive">
                       <thead>
                        <tr>
                          <th width="2%">No</th>
                          <th width="10%">Jabatan</th>
                          <th width="10%">Departemen</th>
                          <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      foreach ($jabatan as $jab):
                      ?>                
                      <tr>
                        <td style="vertical-align:middle"><?=$i++;?></td>
                        <td style="vertical-align:middle"><?=$jab->nama_jabatan;?></td>
                        <td style="vertical-align:middle"><?=$jab->nama_departemen;?></td>
                        <td style="vertical-align:middle">
                          
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#ModalEdit<?php echo $jab->id_jabatan;?>" data-toggles="tooltip" title="Edit"><span class="ion ion-edit"></span></a>

                            <a class="btn btn-danger btn-action mr-1" data-toggle="modal" data-target="#ModalHapus<?php echo $jab->id_jabatan;?>" data-toggles="tooltip" title="Hapus"><span class="ion ion-trash-b"></span></a>
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
            <h5>Tambah jabatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'jabatan/simpan'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
              <label for="inputNamaJabatan">Nama Jabatan</label>
                <input id="inputNamaJabatan" type="text" class="form-control" name="jabatan" autofocus >
            </div>

            <div class="form-group">
              <label for="inputDepartemen">Nama Departemen</label>
                 <?php echo cmb_dinamis('id_departemen', 't_departemen', 'nama_departemen', 'id_departemen','ASC') ?>
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

<?php foreach ($jabatan as $jab): ?>
<!--modal edit-->
<div class="modal fade" id="ModalEdit<?=$jab->id_jabatan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Edit jabatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'jabatan/update'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <input type="hidden" name="id_jabatan" value="<?php echo $jab->id_jabatan;?>"/>
            <div class="form-group">
              <label for="inputNamaJabatan">Nama Jabatan</label>
                <input id="inputNamaJabatan" type="text" class="form-control" name="jabatan" value="<?=$jab->nama_jabatan?>" autofocus >
            </div>

            <div class="form-group">
              <label for="inputDepartemen">Nama Departemen</label>
                 <?php echo cmb_dinamis('id_departemen', 't_departemen', 'nama_departemen', 'id_departemen',$jab->id_departemen,'DESC') ?>
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

<!--modal Hapus-->
<div class="modal fade" id="ModalHapus<?=$jab->id_jabatan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Hapus jabatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'jabatan/delete'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <input type="hidden" name="id_jabatan" value="<?php echo $jab->id_jabatan;?>"/>
             <p>Apakah Anda yakin mau menghapus jabatan: <b><?=$jab->nama_jabatan;?></b> ?</p>
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
