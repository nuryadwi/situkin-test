<section class="section">
  <h1 class="section-header">
	<div><?=$c_des; ?></div>
  </h1>
  <div class="section-body">
		<div class="card card-primary">
		  <div class="card-header">
			  <h4>Pilih Jenis Tugas</h4>
		  </div>
		     <div class="card-body">
         <div class="row">
              <div class="col-12 col-sm-12 col-md-4">
                <ul class="nav nav-pills flex-column" id="myTab2" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="jabatan-tab4" data-toggle="tab" href="#jabatan" role="tab" aria-controls="jabatan" aria-selected="true">Tugas Jabatan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tambahan-tab4" data-toggle="tab" href="#tambahan" role="tab" aria-controls="tambahan" aria-selected="false">Tugas Tambahan</a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-sm-12 col-md-8">
                <div class="tab-content" id="myTab2Content">
                  <div class="tab-pane fade show active" id="jabatan" role="tabpanel" aria-labelledby="jabatan-tab4">
                  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" autocomplete="off">  
                    <div class="row">  
                      <div class="form-group col-md-5">
                        <label for="id_skp">Pilih Kegiatan</label>
                        <input list="data_tugas" id="id_skp" type="text" name="id_skp" class="form-control" autofocus onchange="return autocom();">
                      </div>
                      <div class="form-group col-md-7">
                      <label for="inputKegiatan">Uraian Kegiatan</label>
                      <input id="kegiatan" type="text" class="form-control" name="kegiatan" autofocus disabled>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                      <label for="inputTanggal">Tanggal</label>
				                <input id="inputTanggal" type="text" class="form-control tanggal" name="tanggal" placeholder="Tanggal" autofocus>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputJamMulai">Jam Mulai</label>
                        <input style="text-align: center;" id="inputJamMulai" type="time" class="form-control" name="jam_mulai" placeholder="" autofocus>
                      </div>
                        <div class="form-group col-md-3">
                        <label for="inputJamSelesai">Jam Selesai</label>
                        <input style="text-align: center;" id="inputJamSelesai" type="time" class="form-control" name="jam_selesai" placeholder="" autofocus>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="inputOutput">Hasil/Output</label>
                        <input id="inputOutput" type="text" class="form-control" name="output" placeholder="Hasil" autofocus>
                      </div>
                      <div class="form-group col-md-8">
                        <label for="inputSatuan">Satuan</label>
                        <input id="satuan" type="text" class="form-control" name="satuan" placeholder="Satuan" autofocus disabled>
                      </div>
                    </div>

                    <div class="form-group">
                      <input type="radio" name="tab" value="Tidak Ada" onclick="show1();" />
                      <label class="custom-control-label" style="font-size:13px;"><b>Tidak Ada</b></label>
                      &nbsp;
                      <input type="radio" name="tab" value="Ada" onclick="show2();" />
                      <label class="custom-control-label" style="font-size:13px;"><b>Ada Dokumen</b></label>
                    </div>

                    <div id="div1" style="display:none;">

                      <div class="form-group">
                        <label for="inputPemberi">Dokumen</label>
                        <input type="file" name="files" id="files" class="form-control" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="reset" class="btn btn-default btn-sm"><i class="ion ion-refresh"></i>Reset</button>
                      <button type="submit" class="btn btn-primary btn-sm" id="simpan"><i class="ion ion-android-send"></i> Kirim</button>
                    </div>
                    </form>

                  </div>
                  <div class="tab-pane fade" id="tambahan" role="tabpanel" aria-labelledby="tambahan-tab4">
                  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="">Kegiatan</label>
                      <input type="text" name="kegiatan" id="kegiatan" class="form-control" placeholder="Kegiatan" autofocus>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="">Tanggal</label>
                        <input type="text" class="form-control tanggal" name="tanggal" placeholder="Tanggal" autofocus>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="">Jam Mulai</label>
                        <input id="inputJamMulai" type="time" class="form-control" name="jam_mulai" placeholder="" autofocus>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="">Jam Selesai</label>
                        <input id="inputJamSelesai" type="time" class="form-control" name="jam_selesai" placeholder="" autofocus>
                      </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-4">
                      <label for="inputOutput">Hasil/Output</label>
                      <input id="inputOutput" type="text" class="form-control" name="output" placeholder="Hasil" autofocus>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="inputVolume">Volume</label>
                      <input id="inputVolume" type="number" class="form-control" name="jumlah" placeholder="Angka" autofocus>
                    </div>
                    <div class="form-group col-md-5">
                      <label for="inputSatuan">Satuan</label>
                      <input id="inputSatuan" type="text" class="form-control" name="satuan" placeholder="Satuan" autofocus>
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="">Pemberi Tugas</label>
                      <input type="text" class="form-control" name="pemberi_tugas" placeholder="Pemberi Tugas">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-sm" id="simpan"><i class="ion ion-android-send"></i> Kirim</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
         </div>
        </div>
  </div>
</section>
<datalist id="data_tugas">
<?php 
  foreach($skp as $tugas)
  {
    echo "<option value='$tugas->id_skp'>$tugas->kegiatan</option>";
  }
?>
</datalist>
<script src="<?php echo base_url() ;?>assets/dist/modules/ajax.js"></script>
<script>
  function autocom(){
    var id_skp = document.getElementById('id_skp').value;
    $.ajax({
      url:"<?php echo base_url();?>raport/cari",
      data: '&id_skp='+id_skp,
      success:function(data){
        var hasil = JSON.parse(data);
        console.log(hasil);
        $.each(hasil, function(key,val){
          document.getElementById('id_skp').value=val.id_skp;
          document.getElementById('kegiatan').value=val.kegiatan;
          document.getElementById('satuan').value=val.satuan;
        });
      }
    });
  }
</script>