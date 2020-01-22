<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div>
  </h1>
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalAdd"><span class="ion ion-plus"></span> Tambah Level</a>
                </div>
              <div class="card-body p-3">
                    <table id="tables" class="table table-bordered table-striped table-responsive">
                       <thead>
                        <tr>
                          <th width="2%">No</th>
                          <th width="10%">Nama Level</th>
                          <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      foreach ($role as $lvl):
                      ?>                
                      <tr>
                        <td style="vertical-align:middle"><?=$i++;?></td>
                        <td style="vertical-align:middle"><?=$lvl->nama_role;?></td>
                        <td style="vertical-align:middle">
                            <a class="btn btn-warning btn-action mr-1" data-toggle="modal" data-target="#ModalAkses<?php echo $lvl->id_role;?>" data-toggles="tooltip" title="Beri Akses"><i class="ion ion-unlocked"></i></a>

                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#ModalEdit<?php echo $lvl->id_role;?>" data-toggles="tooltip" title="Edit"><span class="ion ion-edit"></span></a>
                            <a class="btn btn-danger btn-action mr-1" data-toggle="modal" data-target="#ModalHapus<?php echo $lvl->id_role;?>" data-toggles="tooltip" title="Hapus"><span class="ion ion-trash-b"></span></a>

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
            <h5>Tambah Level</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'userlevel/simpan'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
            <label for="inputNamaRole">Nama Level</label>
              <input id="inputNamaRole" type="text" class="form-control" name="nama_role" Placeholder="Nama Level" autofocus >
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

<?php foreach ($role as $lvl): ?>
<!-- modal add -->
<div class="modal fade" id="ModalEdit<?=$lvl->id_role?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Edit Nama Level</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'userlevel/update'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id_role" value="<?php echo $lvl->id_role;?>"/>
            <div class="form-group">
            <label for="inputNamaRole">Nama Level</label>
              <input id="inputNamaRole" type="text" class="form-control" name="nama_role" Placeholder="Nama Level" value="<?=$lvl->nama_role?>" autofocus >
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-sm" id="simpan">Update</button>
        </div>
      </form>
      </div>
    </div>
</div>
<!--modal Hapus-->
<div class="modal fade" id="ModalHapus<?=$lvl->id_role?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Hapus Level</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'userlevel/delete'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <input type="hidden" name="id_role" value="<?php echo $lvl->id_role;?>"/>
             <p>Apakah Anda yakin mau menghapus Bagian: <b><?=$lvl->nama_role;?></b> ?</p>
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

<div class="modal fade" id="ModalAkses<?=$lvl->id_role?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Beri Hak Akses: <b><?=$lvl->nama_role?></b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
          <!--modal body-->
          <div class="modal-body"  style="height:500px;">

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                   <thead>
                    <tr>
                      <th width="2%">No</th>
                      <th width="10%">Nama Menu</th>
                      <th width="10%">Beri Hak Akses</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  $i=1;
                  foreach ($menu as $m) {
                     echo "<tr>
                            <td>$i</td>
                            <td>$m->title</td>
                            <td align='center'><input type='checkbox' ".  checked_akses($lvl->id_role, $m->id_menu)." onClick='kasi_akses($m->id_menu,$lvl->id_role)'></td>
                       </tr>";
                        $i++;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- end modal body-->
          <div class="modal-footer">
          <button onclick="window.location.reload()" type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Selesai</button>
        </div>
      </div>
    </div>
</div>
<?php endforeach ?>
<script type="text/javascript">
      function kasi_akses(id_menu,id_role){
          //alert(id_menu);
          var id_menu = id_menu;
          var level = id_role;
          //alert(level);
          $.ajax({
              url:"<?php echo base_url()?>userlevel/kasi_akses_ajax",
              data:"id_menu=" + id_menu + "&level="+ level ,
              success: function(html)
              { 
              }
          });
      }    
    </script>
