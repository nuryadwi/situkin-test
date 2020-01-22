<script>
th, td {white-space:nowrap;}
	div.dataTables_wrapper{
		width: 800px;
		margin: 0 auto,
	}
</script>
<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div>
  </h1>
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4>Tambahkan Pegawai</h4>
              <form autocomplete="off" class="form-horizontal row" action="<?php echo base_url().'smart/tambah'?>" method="post" enctype="multipart/form-data">
                <input id="id_user" type="hidden" class="form-control" name="id_user">
                <div class="form-group col-md-3 col-sm-12">
                  <label for="">Pegawai</label>
                    <input list="data_pegawai" id="nip" type="text" name="nip" class="form-control" autofocus onchange="return autofill();" placeholder="NIP / Nama Pegawai">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="">Nama</label>
                    <input id="full_name" type="text" class="form-control" name="full_name" autofocus disabled>
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="">Jabatan</label>
                    <input id="jabatan" type="text" class="form-control" name="jabatan" autofocus disabled>
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <label for="">Departemen</label>
                    <input id="departemen" type="text" class="form-control" name="departemen" autofocus disabled >
                </div>
                <div class="form-group col-md-8 col-sm-12">  
                  <button type="reset" class="btn btn-default btn-sm"><i class="ion ion-refresh"></i>Clear</button>
                  <button type="submit" class="btn btn-primary btn-sm" name="tambah"><i class="ion ion-plus"></i>Tambahkan</button>
                </div>
                </form>
              </div>
             <div class="clearfix"></div>
          <div class="card-body p-3">
              <table id="tables" class="table table-bordered table-striped table-responsive">
                       <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th width="10%">Nama Pegawai</th>
                          <th width="10%">Jabatan</th>
                          <?php foreach ($kriteria as $krit): ?>
                            <th width="3%"><?=$krit->kriteria?></th>
                          <?php endforeach ?>
                          <th width="5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i =1;
                    foreach ($alternatif as $alt): ?>          
                      <tr>
                        <td style="vertical-align:middle">
                          <a data-toggle="modal" data-target="#ModalHapusPegawai<?=$alt->id_alternatif?>" style="color:red;" data-toggles="tooltip" title="Hapus Pegawai">
                            <span class="ion ion-close"></span></a>
                          <?=$i++?> 
                        </td>
                        <td style="vertical-align:middle"><?=$alt->full_name;?></td>
                        <td style="vertical-align:middle"><?=$alt->nama_jabatan." ".$alt->nama_departemen;?></td>
                        <?php foreach ($kriteria as $krit): ?>
                          <td style="text-align: center;">
                            <?php
                              $query = $this->db->query("SELECT *
                                                          FROM t_alternatif_kriteria
                                                          WHERE id_kriteria='".$krit->id_kriteria."'
                                                          AND id_alternatif='".$alt->id_alternatif."'");
                              $altkriteria = $query->result();
                              foreach ($altkriteria as $altkri) {
                                echo round($altkri->nilai_alternatif_kriteria,1);
                              }
                            ?>
                          </td>
                        <?php endforeach ?>
                        <td style="text-align: center;">
                          <?php if (!empty($altkriteria)) { ?>
                            <a class="btn btn-danger btn-action mr-1" data-toggle="modal" data-target="#ModalHapus<?=$alt->id_alternatif?>" data-toggles="tooltip" title="Hapus Nilai"><span class="ion ion-trash-a"></span></a>
                          <?php }else{ ?>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#ModalAdd<?=$alt->id_alternatif?>" data-toggles="tooltip" title="Beri Nilai"><span class="ion ion-edit"></span></a>
                         <?php } ?>
                          </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                    </table>
                <!-- tombol hitung -->
                <?php if (!empty($altkri->nilai_alternatif_kriteria) == '0' || !empty($altkri->nilai_alternatif_kriteria)): ?>
                  <div style="text-align: center;">
                    <button onclick="location.href='<?php echo base_url();?>smart_report'" class="btn btn-primary btn-action mr-1" data-toggles="tooltip" title="Perhitungan"><i class="ion ion-ios-calculator"></i>&nbsp;Hitung Nilai</button>
                  </div>
                <?php endif ?>
                <!-- end tombol hitung -->
                
                <hr>
                <!-- info -->
                <div class="row col-4">
                  <div class="alert alert-primary alert-has-icon">
                      <div class="alert-icon"><i class="ion-ios-lightbulb-outline"></i></div>
                      <div class="alert-body">
                        <div class="alert-title">Keterangan:</div>
                        <p>
                          <?php 
                            $i=1;
                            foreach ($kriteria as $krit) :?>
                            <ul>
                              <li><?=$krit->kriteria.': '.$krit->nama_kriteria?></li>
                            </ul>
                          <?php endforeach?>
                        </p>
                      </div>
                    </div>
                </div>
                <!-- end info -->
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php foreach ($alternatif as $alt): ?>
<!-- Modal Add -->
<div class="modal fade" id="ModalAdd<?=$alt->id_alternatif?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Form Penilaian: <small><?=$alt->full_name?></small></h5>   
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'smart/simpan'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body" style="height: 450px">
            <!-- info tugas terkumpul-->
            <div class="alert alert-primary alert-has-icon">
              <div class="alert-icon"><i class="ion-ios-lightbulb-outline"></i></div>
              <div class="alert-body">
                <?php 
                  $bln = date('m');
                  $thn = date('Y');
                  $awal = $thn.'-'.$bln.'-01';
                  $akhir = $thn.'-'.$bln.'-31';
                  $where = ['tanggal >=' => $awal, 'tanggal <=' => $akhir, 't_tugas.id_user' => $alt->id_user, 'jml' => 1];
                  
                  $this->db->select_sum('jml','jumlah');
                  $this->db->from('t_tugas');
                  $this->db->where($where);
                  $jml = $this->db->get()->row();

                  //hitung jumlah tugas
                  $n_out = $jml->jumlah;
                  $maks = 10;
                  if ($n_out < $maks ) {
                   $n_out;
                  }else{
                    $hsl1 = $n_out-$maks;
                    $hsl2 = $n_out-$hsl1;
                    $n_out = $hsl2;
                  }
                ?>
                <div class="alert-title">Info!</div>
                <p>Jumlah tugas harian <?=$alt->full_name?> yang terkumpul bulan ini:&nbsp;
                  <?php if (!empty($n_out)): ?>
                    <?php echo"<b>".($n_out)."</b>";
                    ?>
                    <p>Silahkan dimasukkan kebagian jumlah tugas pegawai</p>
                  <?php else: ?>
                    <b>Tidak ada</b>
                    <p>Kosongkan jika tidak ada tugas</p>
                  <?php endif ?>
                  

                </p>
              </div>
            </div>
            <!-- end info-->
            <input type="hidden" name="alt" value="<?php echo $alt->id_alternatif;?>"/>
            <?php foreach ($kritparam as $kp): ?>
              <input type="hidden" name="kri[<?=$kp->id_kriteria?>]" value="<?=$kp->id_kriteria?>">
              <div class="form-group">
              <label class="control-label"><?=$kp->deskripsi?>.&nbsp;<span style="color: red">min:<?=$kp->min?> |maks:<?=$kp->maks?></span></label>
                <input type="number" name="altkri[<?=$kp->id_kriteria?>]" class="form-control col-lg-6">
              </div>

            <?php endforeach ?>
          </div>
          <!-- end modal body-->
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm btn-round" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-sm btn-round" id="simpan"><i class="ion ion-plus"></i>&nbsp;Tambahkan</button>
        </div>
      </form>
      </div>
    </div>
</div>
<!-- Hapus Nilai-->
<div class="modal fade" id="ModalHapus<?=$alt->id_alternatif?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Hapus Nilai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'smart/delete'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
          <input type="hidden" name="id_alternatif" value="<?php echo $alt->id_alternatif;?>"/>
          <p>Apakah Anda yakin mau menghapus penilaian dari: <b><?=$alt->full_name;?></b> ?</p>
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

<!-- Hapus Nilai-->
<div class="modal fade" id="ModalHapusPegawai<?=$alt->id_alternatif?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Hapus Pegawai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'smart/hapus_alternatif'?>" method="post" enctype="multipart/form-data">
          <!--modal body-->
          <div class="modal-body">
          <input type="hidden" name="id_alternatif" value="<?php echo $alt->id_alternatif;?>"/>
          <p>Apakah Anda yakin akan menghapus <b><?=$alt->full_name;?></b> dari daftar penilaian?</p>
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

<datalist id="data_pegawai">
    <?php
    foreach ($pegawai as $p)
      { 
        echo "<option value='$p->nip'>$p->full_name</option>";
      }
    ?>
    
</datalist>
<script src="<?php echo base_url() ;?>assets/dist/modules/ajax.js"></script>
<script>
function autofill(){
  var nip = document.getElementById('nip').value;
  $.ajax({
    url:"<?php echo base_url();?>smart/cari",
    data: '&nip='+nip,
    success:function(data){
      var hasil = JSON.parse(data);
      console.log(hasil);
      $.each(hasil, function(key,val){
        document.getElementById('nip').value=val.nip;
        document.getElementById('id_user').value=val.id_user;
        document.getElementById('full_name').value=val.full_name;
        document.getElementById('jabatan').value=val.nama_jabatan;
        document.getElementById('departemen').value=val.nama_departemen;

      });
    }
  });
}
</script>