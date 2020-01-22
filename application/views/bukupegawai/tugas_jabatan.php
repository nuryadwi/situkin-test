<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div>
  </h1>
  <div class="section-body">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
			  <h4>tabel tugas jabatan</h4>
		  </div>
			<div class="card-body">
				<table class="table table-bordered table-striped table-hover table-responsive">
					<thead>
						<tr>
							<th width="2%">#</th>
							<th width="15%">Kegiatan</th>
							<th width="5%">Kuantitas</th>
							<th width="5%">Satuan</th>
							<th width="5%">Kualitas</th>
							<th width="5%">Waktu</th>
							<th width="5%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$i=1;
							foreach($tugas as $tgs) :
						?>
						<tr>
							<td><?=$i++;?></td>
							<td><?=$tgs->kegiatan; ?></td>
							<td><?=$tgs->kuantitas; ?></td>
							<td><?=$tgs->satuan; ?></td>
							<td><?=$tgs->kualitas;?></td>
							<td><?=$tgs->waktu.' Bulan'; ?></td>
							<td>
							
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		  </div>
		</div>
		<div class="col-md-4">
        <div class="card card-primary">
          <div class="card-header">
			  <h4>Tambah Tugas</h4>
		  </div>
			<div class="card-body">
			<form autocomplete="off" class="form-horizontal" action="<?php echo base_url()?>tugas_jabatan/add" method="post" enctype="multipart/form-data">
				<input type="hidden" class="form-control" name="id_skp">
				<div class="form-group">
				  	<label for="inputKegiatan">Kegiatan</label>
					<input id="inputKegiatan" type="text" class="form-control" name="kegiatan" placeholder="Uraian Kegiatan" autofocus>
					<?php echo form_error('kegiatan'); ?>
				</div>
				<div class="row">
				<div class="form-group col-lg-7">
				  	<label for="inputKuantitas">Kuantitas/Output</label>
					<input id="inputKuantitas" type="text" class="form-control" name="kuantitas" placeholder="Kuantitas/ Output" autofocus>
				</div>
				<div class="form-group col-lg-5">
				  	<label for="inputKuantitas">Satuan</label>
					<input id="inputKuantitas" type="text" class="form-control" name="satuan" placeholder="Satuan" autofocus>
				</div>
				</div>
				<div class="form-group">
				  	<label for="inputKuantitas">Kualitas/Mutu</label>
					<input id="inputKuantitas" type="text" class="form-control" name="kualitas" placeholder="Kualitas/ Mutu. Default:100" autofocus>
				</div>
				<div class="form-group">
				  	<label for="inputWaktu">Waktu</label>
					<input id="inputWaktu" type="text" class="form-control" name="waktu" placeholder="1 Bulan" autofocus disabled>
				</div>
				
				<div class="form-group" style="text-align:right;">
					<button type="reset" class="btn btn-secondary btn-sm btn-round"><i class="ion ion-refresh"></i> Reset</button>
					<button type="submit" class="btn btn-primary btn-sm btn-round" name="tambah"><i class="ion ion-plus"></i> Tambah</button>
				</div>
			</form>
			</div>
		  </div>
		</div>
	  </div>
	</div>
</section>
		