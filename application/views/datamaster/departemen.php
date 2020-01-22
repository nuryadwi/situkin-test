<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div>
  </h1>
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalAdd"><span class="ion ion-plus"></span> Tambah Departemen</a>
                </div>
                <div class="card-body p-3">
                  <table id="tables" class="table table-bordered table-striped table-responsive">
                       <thead>
                        <tr>
                          <th width="2%">No</th>
                          <th width="40%">Nama Departemen</th>
                          <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      foreach ($departemen as $dep):
                      ?>                
                      <tr>
                        <td style="vertical-align:middle"><?=$i++;?></td>
                        <td style="vertical-align:middle"><?=$dep->nama_departemen;?></td>
                        <td style="vertical-align:middle">
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#ModalEdit<?php echo $dep->id_departemen;?>" data-toggles="tooltip" title="Edit"><span class="ion ion-edit"></span></a>
                            <a class="btn btn-danger btn-action mr-1" data-toggle="modal" data-target="#ModalHapus<?php echo $dep->id_departemen;?>" data-toggles="tooltip" title="Hapus"><span class="ion ion-trash-b"></span></a>

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
            <h5>Tambah Bagian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'departemen/simpan'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
              <label for="inputNamaDepartemen">Nama Departemen</label>
                <input id="inputNamaDepartemen" type="text" class="form-control" name="departemen" Placeholder="Nama Departemen" autofocus >
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

<?php foreach ($departemen as $dep1): ?>

<!-- modal Edit -->
<div class="modal fade" id="ModalEdit<?=$dep1->id_departemen?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Edit Departemen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'departemen/update'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id_departemen" value="<?php echo $dep1->id_departemen;?>"/>
            <div class="form-group">
              <label for="inputNamaDepartemen">Nama Departemen</label>
                <input id="inputNamaDepartemen" type="text" class="form-control" name="departemen" Placeholder="Nama Departemen" value="<?=$dep1->nama_departemen?>" autofocus >
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
<!--modal Hapus-->
<div class="modal fade" id="ModalHapus<?=$dep1->id_departemen?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Hapus Departemen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'departemen/delete'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
          <input type="hidden" name="id_departemen" value="<?php echo $dep1->id_departemen;?>"/>
             <p>Apakah Anda yakin mau menghapus Bagian: <b><?=$dep1->nama_departemen;?></b> ?</p>
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