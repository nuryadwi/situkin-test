<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div>
  </h1>
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
              <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAdd" style="color: white;"><span class="ion ion-paper-airplane"></span> Kirim Tugas</a>

                <center>
                  <span class="badge badge-success"><i class="ion ion-ios-checkmark-outline"></i>&nbsp;<b><?=$jml_tugas_acc?></b> Tugas hari ini</span>
                  <span class="badge badge-info"><i class="ion ion-ios-checkmark-outline"></i>&nbsp;<b><?=$jml_tugas_blm?></b> Tugas bulan ini</span>

                </center>
                </div>
                <div class="card-body p-3">
                    <table id="tables" class="table table-bordered table-striped table-responsive">
                       <thead>
                        <tr>
                          <th width="2%">No.</th>
                          <th width="20%">Kegiatan</th>
						  <th width="5%">Tanggal</th>
                          <th width="5%">Output</th>
                          <th width="5%">Volume</th>
                          <th width="5%">Satuan</th>
                          <th width="15%">Keterangan</th>
                          <th width="10%">Dokumen</th>
						  <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>             
                      <tr>
						  <td style="vertical-align:middle">1</td>
						  <td style="vertical-align:middle">1</td>
						  <td style="v	ertical-align:middle">1</td>
						  <td style="vertical-align:middle">1</td>
						  <td style="vertical-align:middle">1</td>
						  <td style="vertical-align:middle">1</td>
						  <td style="vertical-align:middle">1</td>
						  <td style="vertical-align:middle">1</td>
						  <td style="vertical-align:middle">1</td>
                      </tr>
                    </tbody>
                    </table>
                </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--modal kirim-->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
            <h6 style="color:white;">Input Data Laporan Capaian Kinerja Harian</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'bukupegawai/input'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body" style="height:450px;"> 
		   <div class="row">
			<div class="form-group col-lg-8">
              <label for="inputJenis">Jenis Tugas</label>
                <select class="form-control" name="" id="">
					<option value="">--Silahkan Pilih--</option>
					<option></option>
				</select>
            </div>
			<div class="form-group col-lg-4">
              <label for="inputTanggal">Tanggal</label>
                <input id="inputTanggal" type="text" class="form-control tanggal" name="tanggal" placeholder="Tanggal" autofocus>
            </div>
		   </div>
            <div class="form-group">
              <label for="inputKegiatan">Kegiatan</label>
                <textarea name="kegiatan" id="inputKegiatan" class="form-control" rows="2"></textarea>
            </div>
			<div class="row">
            <div class="form-group col-md-7">
              <label for="inputOutput">Output</label>
                <input id="inputOutput" type="text" class="form-control" name="output" placeholder="Hasil" autofocus>
            </div>
			
			<div class="form-group col-md-5">
              <label for="inputVolume">Volume Kegiatan</label>
                <input id="inputVolume" type="text" class="form-control" name="jumlah" placeholder="Angka" autofocus>
            </div>
           </div>
			
			<div class="form-group">
              <label for="inputSatuan">Satuan</label>
                <input id="inputSatuan" type="text" class="form-control" name="satuan" placeholder="Satuan" autofocus>
            </div>
			<div class="form-group">
              <label for="inputKeterangan">Keterangan</label>
                <textarea name="keterangan" id="inputKeterangan" class="form-control" rows="1"></textarea>
            </div>
			<div class="form-group">
              <label for="inputPemberi">Pemberi Tugas</label>
                <input id="inputPemberi" type="text" class="form-control" name="pemberi_tugas" placeholder="Pemberi Tugas" autofocus>
            </div>
			
			<div class="form-group">
				<input type="radio" name="tab" value="Tidak Ada" onclick="show1();" />
				<label class="custom-control-label">Tidak Ada</label>
				<input type="radio" name="tab" value="Ada" onclick="show2();" />
				<label class="custom-control-label">Ada Dokumen</label>
			</div>
			
			<div id="div1" style="display:none;">
				<div class="form-group">
				  <label for="inputPemberi">Dokumen</label>
					<input type="file" name="files" id="files" class="form-control" value="">
				</div>
			</div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary btn-sm" id="simpan"><i class="ion ion-android-send"></i>Kirim</button>
        </div>
      </form>
      </div>
    </div>
</div>