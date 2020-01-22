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
            <!--style="width: 200px; height: 200px; align-items: center;"-->
              <img alt="image" class="profile-widget-picture rounded-circle" src="<?=base_url() ;?>assets/foto_profil/<?=$this->session->userdata('images')?>">
              <h3 class="text-center"><?php echo $this->session->userdata('full_name'); ?></h3>
              <div class="clearfix"></div>
              <p class="text-muted text-center"><?=$jabatan?></p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Login terakhir:&nbsp;</b> <a class="pull-right"><?=$last_login?></a>
                </li>
                <li class="list-group-item">
                  <b>Status Pengguna:&nbsp;</b> <a class="pull-right"><?=$status?></a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Daftar:&nbsp;</b> <a class="pull-right"><?=$create_on?></a>
                </li>
              </ul>
              <div class="card-body profile-widget-description">
                <strong><i class="ion ion-ios-person margin-r-5"></i> NIP</strong>
                <p><?=$nip?></p>
                <hr>
                 <strong><i class="ion ion-ios-telephone margin-r-5"></i> No. Telepon</strong>
                <p><?=$phone?></p>
                <hr>
                <strong><i class="ion ion-ios-location margin-r-5"></i> Alamat</strong>
                 <p class="text-muted"><?=$alamat?></p>
                
             </div>
        </div>
      </div>
    </div>
    <!--right-->
    <div class="col-md-8">
      <div class="card card-primary">
          <div class="card-body">
            <ul class="nav nav-pills" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="profil-tab" data-toggle="tab" href="#profil" role="tab" aria-controls="home" aria-selected="true">Setting Profil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="akun-tab" data-toggle="tab" href="#akun" role="tab" aria-controls="profile" aria-selected="false">Setting Akun</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="home-tab3">
                  <form autocomplete="off" class="form-horizontal form-label-left" action="<?php echo base_url().'profil/simpan'?>" enctype="multipart/form-data" method="post">
                      <input type="hidden" name="id_user" value="<?=$id_user?>" />
                        
                        <div class="form-group">
                            <label for="inputNIP">No. NIP</label>
                            <input id="inputNIP" type="text" class="form-control" name="nip" value="<?=$nip?>" placeholder="No. NIP" autofocus >
                        </div>
                        <div class="row">
                        <div class="form-group col-6">
                            <label for="inputNIK">No. NIK</label>
                            <input id="inputNIK" type="text" class="form-control" name="nik" value="<?=$nik?>" placeholder="No. NIK" autofocus >
                        </div>
                        <div class="form-group col-6">
                            <label for="inputNama">Nama Lengkap</label>
                            <input id="inputNama" type="text" class="form-control" name="nama" value="<?=$nama?>" placeholder="Nama Lengkap" autofocus >
                          </div>
                      </div>
                        <div class="row">
                          <div class="form-group col-6">
                            <label for="inputTanggal">Tanggal Lahir</label>
                            <input id="inputTanggal" type="text" class="form-control tanggal" name="tgl_lahir" value="<?=$tgl_lahir?>" placeholder="Pilih Tanggal" autofocus >
                          </div>
                          <div class="form-group col-6">
                            <label for="inputEmail">Email</label>
                            <input id="inputEmail" type="email" class="form-control" name="email" value="<?=$email?>" placeholder="Alamat Email" autofocus >
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-6">
                            <label for="inputPhone">No. Telepon</label>
                            <input id="inputPhone" type="text" class="form-control" name="phone" value="<?=$phone?>" placeholder="No. Telepon" autofocus >
                          </div>

                          <div class="form-group col-6">
                            <label for="inputGender">Jenis Kelamin</label>
                              <select name="gender" class="form-control" id="gender" value="<?=$gender?>">
                              <option disabled selected>--Pilih Jenis Kelamin--</option>
                              <option value="laki-Laki"<?php if($gender == 'laki-Laki') { echo "selected";}?>>Laki-Laki</option>
                              <option value="perempuan"<?php if($gender == 'perempuan') { echo "selected";}?>>Perempuan</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="inputImages">Foto Profil</label>
                            <input type="file" name="images" class="form-control-file <?php echo form_error('images') ? 'is-invalid':''?>" />
                            <input type="hidden"  name="old_images" class="form-control-file" value="<?=$images?>" />
                        </div>
                        <div class="form-group">
                          <label for="inputAlamat">Alamat</label>
                          <textarea class="form-control" name="alamat" rows="3" id="inputAlamat" name="alamat" placeholder="Alamat"><?=$alamat?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </form>
                  </div>
                  <!--end profil-->
                <div class="tab-pane fade" id="akun" role="tabpanel" aria-labelledby="profile-tab3">
                  <form autocomplete="off" class="form-horizontal form-label-left" action="<?php echo base_url().'profil/ganti_password'?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
                    <div class="form-group">
                      <label for="inputUsername">Username</label>
                      <input id="inputUsername" type="text" class="form-control" name="username" value="<?=$username?>" placeholder="Username" autofocus >
                    </div>

                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="myCheck" class="custom-control-input" tabindex="3" onclick="gantipass()">
                        <label class="custom-control-label" for="myCheck">Klik Untuk Ganti Password</label>
                      </div>
                    </div>
                    
                     <div id="show" style="display: none">
                        <div class="form-group">
                          <label>Password</label>
                          <div class="input-group">
                            <input type="password" class="form-control pwd" name="password" placeholder="Password">
                            <span class="input-group-btn">
                              <button class="btn btn-default reveal" type="button" data-toggles="tooltip" title="Show Password"><i class="ion ion-eye"></i></button>
                            </span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Ketik Ulang Password</label>
                          <div class="input-group">
                            <input type="password" class="form-control pwd" name="passconf" placeholder="Password">
                            <span class="input-group-btn">
                              <button class="btn btn-default reveal" type="button"><i class="ion ion-eye" data-toggles="tooltip" title="Show Password"></i></button>
                            </span>
                          </div>
                        </div>
                     </div>
                     <div class="form-group">
                          <button type="submit" class="btn btn-sm btn-primary">Ganti</button>
                      </div>

                  </form>
                </div>
                <!--end akun-->
               </div>
               <!-- end tab-->
        </div>
      </div>
  </div>
</section>