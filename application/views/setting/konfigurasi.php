<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div>
  </h1>
  <div class="section-body">
    <div class="row">
      <!-- left -->
      <div class="col-md-4">
        <div class="card-profile-widget">
          <div class="card-body">
              <img alt="image" class="profile-widget-picture rounded-circle" src="<?=base_url() ;?>assets/img_app/<?=$logo?>">
              <h3 class="text-center"><?=$site['name_app']?></h3>
              <div class="clearfix"></div>
              <p class="text-muted text-center"><?=$instansi?></p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email:&nbsp;</b> <a class="pull-right"><?=$email?></a>
                </li>
                <li class="list-group-item">
                  <b>Pimpinan:&nbsp;</b> <a class="pull-right"><?=$pimpinan?></a>
                </li>
                <li class="list-group-item">
                  <b>Sekretaris:&nbsp;</b> <a class="pull-right"><?=$sekretaris?></a>
                </li>
              </ul>
              <div class="profile-widget-description">
                <strong><i class="ion ion-ios-location margin-r-5"></i> Alamat</strong>
                 <p class="text-muted"><?=$alamat?>&nbsp;<span><i class="ion ion-ios-telephone"></i></span><?=$phone?></p>
                <hr>
                <strong><i class="ion ion-ribbon-b margin-r-5"></i> About</strong>
                <p><?=$about?></p>
             </div>
        </div>
      </div>
    </div>
    <!--right-->
    <div class="col-md-8">
      <div class="card card-primary">
          <div class="card-body">
            <?php foreach ($konfig as $k): ?>
              <form autocomplete="off" class="form-horizontal form-label-left" action="<?php echo base_url().'setting/simpan'?>" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id_konfigurasi" value="<?=$k->id_konfigurasi; ?>" />

                  <div class="form-group">
                      <label for="inputNama">Nama Aplikasi</label>
                      <input id="inputNama" type="text" class="form-control" name="nama" value="<?=$k->name_app?>" autofocus >
                  </div>

                  <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input id="inputEmail" type="email" class="form-control" name="email" value="<?=$k->email?>" placeholder="Email" autofocus >
                  </div>
                  <div class="form-group">
                    <label for="inputPhone">No. Telepon</label>
                    <input id="inputPhone" type="text" class="form-control" name="phone" value="<?=$k->phone?>" placeholder="No. Telepon" autofocus >
                  </div>

                  <div class="form-group">
                    <label for="inputPhone">Logo</label> 
                      <input type="file" name="logo" class="form-control-file <?php echo form_error('photo') ? 'is-invalid':''?>" />
                          <input type="hidden"  name="old_images" class="form-control-file" value="<?=$k->logo?>" />
                  </div>
                  <div class="form-group">
                    <label for="inputAlamat">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" id="inputAlamat" name="alamat" placeholder="Alamat"><?=$k->alamat?>
                      </textarea>
                  </div>
                  <div class="form-group">
                    <label for="inputInstansi">Nama Instansi</label>
                    <input id="inputInstansi" type="text" class="form-control" name="instansi" value="<?=$k->instansi?>" placeholder="Nama Instansi" autofocus >
                  </div>
                  <div class="form-group">
                    <label for="inputPimpinan">Nama Pimpinan</label>
                    <input id="inputPimpinan" type="text" class="form-control" name="pimpinan" value="<?=$k->pimpinan?>" placeholder="Nama Pimpinan" autofocus >
                  </div>
                  <div class="form-group">
                    <label for="inputSekretaris">Nama Sekretaris</label>
                    <input id="inputSekretaris" type="text" class="form-control" name="sekretaris" value="<?=$k->sekretaris?>" placeholder="Nama Sekretaris" autofocus >
                  </div>
                  <div class="form-group">
                    <label for="inputAbout">About</label>
                    <textarea class="form-control" name="about" rows="3" id="inputAbout" name="about" placeholder="About"><?=$k->about?>
                      </textarea>
                  </div>

                  <div class="form-group">
                    <div>
                      <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                    </div>
                  </div>

              </form>
          </div>
        <?php endforeach?>
      </div>
  </div>
</section>