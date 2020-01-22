<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div>
  </h1>
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalAdd"><span class="ion ion-plus"></span> Tambah Pengguna</a>
                </div>
                <div class="card-body p-3">
                    <table id="tables" class="table table-bordered table-striped table-responsive">
                       <thead>
                        <tr>
                          <th width="1%">No</th>
                          <th width="5%">Foto</th>
                          <th width="5%">NIP</th>
                          <th width="5%">Username</th>
                          <th width="5%">Nama</th>
                          <th width="5%">Level</th>
                          <th width="5%">Jabatan</th>
                          <th width="5%">Status</th>
                          <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      foreach ($user as $u):
                      ?>                
                      <tr>
                        <td style="vertical-align:middle"><?=$i++;?></td>
                        <td style="vertical-align:middle">
                          <img class="rounded-circle" width="40" height="40" src="<?php echo base_url().'assets/foto_profil/'.$u->images;?>">
                        </td>
                        <td style="vertical-align:middle"><?=$u->nip;?></td>
                        <td style="vertical-align:middle"><?=$u->username;?></td>
                        <td style="vertical-align:middle"><?=$u->full_name;?></td>
                        <td style="vertical-align:middle"><?=$u->nama_role;?></td>
                        <td style="vertical-align:middle"><?=$u->nama_jabatan.' '.$u->nama_departemen?></td>
                        <td style="vertical-align:middle">
                        <?php if ($u->id_user !== '1') { ?>
                          <?php if($u->status == 1) {?>
                              <a href="<?=base_url();?>user/status/2/<?=$u->id_user;?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah kamu yakin akan menonaktifkan akun ini?');">Aktif</a>
                          <?php } else { ?>
                              <a href="<?=base_url();?>user/status/1/<?=$u->id_user;?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin akan mengaktifkan akun ini kembali?');">Non Aktif</a>
                          <?php }?>
                        <?php } ?>
                          </td>
                        <td style="vertical-align: middle;">
                          <?php if ($u->id_user !== '1') { ?>
                            <a class="btn btn-warning btn-sm" href="<?php echo base_url().'user/reset_pass/'.$u->id_user;?>" onclick="return confirm('Apakah kamu yakin akan mereset password akun ini?');" data-toggles="tooltip" title="Reset Password"><span class="ion ion-loop"></span></a>
                          <?php } ?>

                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#ModalEdit<?=$u->id_user;?>" data-toggles="tooltip" title="Edit"><span class="ion ion-edit"></span></a>
                            <a class="btn btn-danger btn-action mr-1" data-toggle="modal" data-target="#ModalHapus<?=$u->id_user;?>" data-toggles="tooltip" title="Hapus"><span class="ion ion-trash-b"></span></a>

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

<!--modal add -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Tambah Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'user/simpan'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body" style="height: 500px">
            <div class="form-group">
            <label for="inputNama">Nama Pegawai</label>
              <input id="inputNama" type="text" class="form-control" name="full_name" Placeholder="Nama Pegawai" autofocus required >
            </div>
            <div class="row">
              <div class="form-group col-6">
              <label for="inputUsername">Username</label>
                <input id="inputUsername" type="text" class="form-control" name="username" Placeholder="Username" autofocus required >
              </div>
              <div class="form-group col-6">
              <label for="inputTanggalLahir">Tanggal Lahir</label>
                <input id="inputTanggalLahir" type="text" class="form-control tanggallahir" name="tgl_lahir" Placeholder="Pilih tanggal" autofocus required >
              </div>
            </div>
            <div class="form-group">
              <label for="inputNIP">NIP</label>
                <input id="inputNIP" type="text" class="form-control" name="nip" Placeholder="NIP" autofocus required >
            </div>
            <div class="form-group">
              <label for="inputLevel">Level Pengguna</label>
                <?php echo cmb_dinamis('id_role', 't_role', 'nama_role', 'id_role','DESC') ?>
            </div>

            <div class="form-group">
              <label for="inputJabatan">Jabatan</label>
                <select class="form-control" name="id_jabatan" id="id_jabatan">
                  <option value="">--Please Select--</option>
                  <?php
                  foreach ($jabatan as $j):
                    ?>
                    <option <?php echo $jabatan_selected == $j->id_jabatan ? 'selected="selected"': ''?> value="<?php echo $j->id_jabatan?>"><?php echo $j->nama_jabatan.' '.$j->nama_departemen?></option>
                  <?php endforeach; ?>

                </select>
            </div>
            <div class="form-group">
              <label for="inputLevel"><span style="color: red;">(*)</span>Password otomatis sesuai dengan tanggal lahir</label>
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

<?php foreach ($user as $u): ?>
<!--modal add -->
<div class="modal fade" id="ModalEdit<?=$u->id_user?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Edit Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'user/update'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <input type="hidden" name="id_user" value="<?php echo $u->id_user; ?>" />
            
            <div class="form-group">
              <label for="inputLevel">Level Pengguna</label>
                <?php echo cmb_dinamis('id_role', 't_role', 'nama_role', 'id_role',$u->id_role,'DESC') ?>
            </div>

            <div class="form-group">
              <label for="inputJabatan">Jabatan</label>
                <select class="form-control" name="id_jabatan" id="id_jab">
                  <option value="">--Silahkan Pilih--</option>
                  <?php
                  $jabatan_selected = $u->id_jabatan;
                  foreach ($jabatan as $j):
                    ?>
                    <option <?php echo $jabatan_selected == $j->id_jabatan ? 'selected="selected"': ''?> value="<?php echo $j->id_jabatan?>"><?php echo $j->nama_jabatan.' '.$j->nama_departemen?></option>
                  <?php endforeach?>

                </select>
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
<div class="modal fade" id="ModalHapus<?=$u->id_user?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Hapus Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'user/delete'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <input type="hidden" name="id_user" value="<?=$u->id_user;?>"/>
             <p>Apakah Anda yakin mau menghapus Bagian: <b><?=$u->full_name;?></b> ?</p>
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

<!-- modal reset -->
<div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Reset Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
          <!--modal body-->
          <div class="modal-body">
            <table>
                <tr>
                    <th style="width:120px;">Username</th>
                    <th>:</th>
                    <th><?php echo $this->session->flashdata('uname');?></th>
                </tr>
                <tr>
                    <th style="width:120px;">Password Baru</th>
                    <th>:</th>
                    <th><?php echo $this->session->flashdata('upass');?></th>
                </tr>
            </table>
          </div>
          <!-- end modal body-->
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>


<!-- chain dropdown -->
  <script src="<?php echo base_url() ;?>assets/dist/modules/chained/jquery-1.10.2.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/dist/modules/chained/jquery.chained.min.js"></script>

<script>
  $("#id_departemen").chained("#id_jabatan");
  $("#id_dep").chained("#id_jab");
</script>