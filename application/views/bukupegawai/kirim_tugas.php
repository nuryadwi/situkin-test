<section class="section">
  <h1 class="section-header">
	<div><?=$c_des; ?></div>
  </h1>
  <div class="section-body">
		<div class="card card-primary">
		  <div class="card-header">
			<h4>Tugas harian</h4>
		  </div>
		  <div class="card-body">
			<form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'send'?>" method="post" enctype="multipart/form-data">
			   <div class="row">
				<div class="form-group col-lg-6">
				  <label for="inputJenis">Jenis Tugas</label>
<!--
					<select class="form-control" name="" id="">
						<option value="">--Silahkan Pilih--</option>
						<option></option>
					</select>
-->
					<?php echo cmb_dinamis('id_kriteria', 't_kriteria', 'nama_kriteria', 'id_kriteria','DESC') ?>
				</div>
				<div class="form-group col-lg-2">
				  <label for="inputTanggal">Tanggal</label>
					<input id="inputTanggal" type="text" class="form-control tanggal" name="tanggal" placeholder="Tanggal" autofocus>
				</div>
				 <div class="form-group col-md-2">
				  <label for="inputJamMulai">Jam Mulai</label>
					<input id="inputJamMulai" type="time" class="form-control" name="jam_mulai" placeholder="" autofocus>
				</div>
				  <div class="form-group col-md-2">
				  <label for="inputJamSelesai">Jam Selesai</label>
					<input id="inputJamSelesai" type="time" class="form-control" name="jam_selesai" placeholder="" autofocus>
				</div>
			   </div>
				<div class="form-group">
				  <label for="inputKegiatan">Kegiatan</label>
					<textarea name="kegiatan" id="inputKegiatan" class="form-control" rows="2" placeholder="Nama Kegiatan"></textarea>
				</div>
				<div class="row">
				<div class="form-group col-md-5">
				  <label for="inputOutput">Hasil/Output</label>
					<input id="inputOutput" type="text" class="form-control" name="output" placeholder="Hasil" autofocus>
				</div>

				<div class="form-group col-md-2">
				  <label for="inputVolume">Jumlah/Volume Kegiatan</label>
					<input id="inputVolume" type="number" class="form-control" name="jumlah" placeholder="Angka" autofocus>
				</div>
				<div class="form-group col-md-5">
				  <label for="inputSatuan">Satuan</label>
					<input id="inputSatuan" type="text" class="form-control" name="satuan" placeholder="Satuan" autofocus>
				</div>
			   </div>

				<div class="row">
				<div class="form-group col-md-7">
				  <label for="inputKeterangan">Keterangan</label>
					<textarea name="keterangan" id="inputKeterangan" class="form-control" rows="1" placeholder="Keterangan"></textarea>
				</div>
				<div class="form-group col-md-5">
				  <label for="inputPemberi">Pemberi Tugas</label>
					<input id="inputPemberi" type="text" class="form-control" name="pemberi_tugas" placeholder="Pemberi Tugas" autofocus>
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
				<div class="clearfix"></div>
				<div class="form-group" style="text-align:right;">
				<button type="reset" class="btn btn-secondary btn-sm"><i class="ion ion-refresh"></i> Kosongkan</button>
				<button type="submit" class="btn btn-primary btn-sm" id="simpan"><i class="ion ion-android-send"></i> Kirim</button>
				</div>
			  </form>
		  </div>
		</div>
  </div>
</section>