<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div>
  </h1>
  <div class="section-body">
    <div class="row">
      <div class="col-12">
    	<div class="card card-primary">
    		<div class="card-header">
    			<h4>Tampilkan Menu Berdasarkan Level</h4>
    		</div>
    		<div class="card-body">
    			<form class="form-horizontal form-label-left" action="<?=$action?>" enctype="multipart/form-data" method="post">
    				<div class="form-group">
    					<div class="col-sm-4">
		                	<?php echo form_dropdown('tampil_menu', array('ya' => 'YA', 'tidak' => 'TIDAK'), $setting['value'], array('class' => 'form-control'));
		                	?>
           			 	</div>
    				</div>
    				<div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                  </div>
    			</form>
    		</div>
    	</div>
      </div>
    </div>
    <div class="row">
    	<div class="col-12">
    		<div class="card card-primary">
    			<div class="card-header">
                    <h4>Daftar Menu</h4>
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalAdd"><span class="ion ion-plus"></span> Tambah Menu</a>
                </div>
              <div class="card-body p-3">
                <table id="tables" class="table table-bordered table-striped table-responsive">
                			 <thead>
				                <tr>
				                  <th width="2%">No</th>
				                  <th width="10%">Nama Menu</th>
				                  <th width="5%">Url</th>
				                  <th width="5%">Icon</th>
				                  <th width="5%">Sub Menu</th>
				                  <th width="5%">Aktif</th>
				                  <th width="10%">Aksi</th>
				                </tr>
			            	</thead>
			            	<tbody>
			            		<?php
			            		$i=1;
			            		foreach ($menu as $m):
			            		?>            		
			            		<tr>
			            			<td style="vertical-align:middle"><?=$i++;?></td>
			            			<td style="vertical-align:middle"><?=$m->title;?></td>
				           			<td style="vertical-align:middle">
				           			<?=$m->url;?></td>
				           			<td style="vertical-align:middle">
				           			<?=$m->icon;?></td>
				           			<td style="vertical-align:middle">
				           			<?=$m->is_main_menu;?></td>
				           			<td style="vertical-align:middle">
				           			<?=rename_string_is_aktif($m->is_aktif);?></td>
			            			<td style="vertical-align:middle">
                      
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#ModalEdit<?php echo $m->id_menu;?>" data-toggles="tooltip" title="Edit"><span class="ion ion-edit"></span></a>

                            <a class="btn btn-danger btn-action mr-1" data-toggle="modal" data-target="#ModalHapus<?php echo $m->id_menu;?>" data-toggles="tooltip" title="Hapus"><span class="ion ion-trash-b"></span></a>
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

<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Tambah Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'kelolamenu/simpan'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                  <label for="inputTitle">Nama Menu</label>
                  <input id="inputTitle" type="text" class="form-control" name="title" placeholder="Nama Menu" autofocus >
              </div>

              <div class="form-group">
                  <label for="inputUrl">Alamat Url</label>
                  <input id="inputUrl" type="text" class="form-control" name="url" placeholder="Alamat Url" autofocus >
              </div>
              <div class="form-group">
                  <label for="inputIcon">Icon</label>
                  <input id="inputIcon" type="text" class="form-control" name="icon" placeholder="Nama Icon" autofocus >
              </div>
              <div class="form-group">
                  <label for="inputSubmenu">Sub Menu</label>
                  <?php echo cmb_dinamis('is_main_menu', 't_menu', 'title', 'id_menu','ASC') ?>
              </div>
              <div class="form-group">
                <label>Ditampilkan</label>
                <select name="is_aktif" class="form-control" id="is_aktif" value="">
                  <option disabled selected>--Pilih Status--</option>
                  <option value="y">Ya</option>
                  <option value="n">Tidak</option>
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

<?php foreach ($menu as $m): ?>
<!-- modal edit -->
<div class="modal fade" id="ModalEdit<?=$m->id_menu?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Edit Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'kelolamenu/update'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <input type="hidden" name="id_menu" value="<?php echo $m->id_menu;?>"/>
            <div class="form-group">
                  <label for="inputTitle">Nama Menu</label>
                  <input id="inputTitle" type="text" class="form-control" name="title" placeholder="Nama Menu" value="<?=$m->title?>" autofocus >
              </div>

              <div class="form-group">
                  <label for="inputUrl">Alamat Url</label>
                  <input id="inputUrl" type="text" class="form-control" name="url" placeholder="Alamat Url" value="<?=$m->url?>" autofocus >
              </div>
              <div class="form-group">
                  <label for="inputIcon">Icon</label>
                  <input id="inputIcon" type="text" class="form-control" name="icon" placeholder="Nama Icon" value="<?=$m->icon?>" autofocus >
              </div>
              <div class="form-group">
                  <label for="inputSubmenu">Sub Menu</label>
                  <?php echo cmb_dinamis('is_main_menu', 't_menu', 'title', 'id_menu',$m->is_main_menu,'DESC') ?>
              </div>
              <div class="form-group">
                <label>Ditampilkan</label>
                 <select name="is_aktif" class="form-control" id="is_aktif" value="<?=$m->is_aktif?>">
                  <option disabled selected>--Pilih Status--</option>
                  <option value="y"<?php if($m->is_aktif == 'y') { echo "selected";}?>>Aktif</option>
                  <option value="n"<?php if($m->is_aktif == 'n') { echo "selected";}?>>Tidak Aktif</option>
                </select>
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

<div class="modal fade" id="ModalHapus<?=$m->id_menu?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Hapus menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'kelolamenu/delete'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
            <input type="hidden" name="id_menu" value="<?php echo $m->id_menu;?>"/>
             <p>Apakah Anda yakin mau menghapus menu: <b><?=$m->title;?></b> ?</p>
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