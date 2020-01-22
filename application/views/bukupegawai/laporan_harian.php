<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div>
  </h1>
	
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
		    <div class="float-right">
               <a data-collapse="#mycard-collapse" class="btn btn-icon"><i class="ion ion-minus"></i></a>
              </div>
			  <div class="collapse show" id="mycard-collapse">
				<h6 class="col-sm-12">Tanggal Laporan</h6>
				<form class="form-horizontal row" action="" method="post">
					
					<div class="form-group col-md-2 col-sm-12">
						<select class="form-control" name="tgl">
						  <?php for($i = 1; $i <= date('d')+31; $i++) { ?>
							<option value="<?=$i;?>"<?php if ($tgl == $i){ echo 'selected'; }?> >
							   <?=$i?>
							</option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group col-md-3 col-sm-12">
						<select class="form-control" name="bln">
						     <option value="01" <?php if ($bln == '01') { echo 'selected'; } ?>>Januari</option>
							 <option value="02" <?php if ($bln == '02') { echo 'selected'; } ?>>Februari</option>
							 <option value="03" <?php if ($bln == '03') { echo 'selected'; } ?>>Maret</option>
							 <option value="04" <?php if ($bln == '04') { echo 'selected'; } ?>>April</option>
							 <option value="05" <?php if ($bln == '05') { echo 'selected'; } ?>>Mei</option>
							 <option value="06" <?php if ($bln == '06') { echo 'selected'; } ?>>Juni</option>
							 <option value="07" <?php if ($bln == '07') { echo 'selected'; } ?>>Juli</option>
							 <option value="08" <?php if ($bln == '08') { echo 'selected'; } ?>>Agustus</option>
							 <option value="09" <?php if ($bln == '09') { echo 'selected'; } ?>>September</option>
							 <option value="10" <?php if ($bln == '10') { echo 'selected'; } ?>>Oktober</option>
							 <option value="11" <?php if ($bln == '11') { echo 'selected'; } ?>>November</option>
							 <option value="12" <?php if ($bln == '12') { echo 'selected'; } ?>>Desember</option>
						</select>
					</div>
					<div class="form-group col-md-2 col-sm-12">
					  <select class="form-control" name="thn">
						  <?php for ($i = 2019; $i <= date('Y')+5; $i++) { ?>
                              <option value="<?=$i;?>" <?php if ($thn == $i){ echo 'selected'; }?>>
                                 <?=$i;?>
                              </option>
                           <?php } ?>
					   </select>
					</div>
					<div class="form-group col-md-3 col-sm-12">
                        <button type="submit" class="btn btn-success btn-sm" name="cari"><i class="ion ion-ios-search-strong"></i> Cari</button>
                      </div>
				</form>
			</div>
		  </div>
		  <div class="card-body">
			  <?php
                   switch ($bln) {
                      case '01':
                         $Bulan = 'Januari';
                         break;
                      case '02':
                         $Bulan = 'Februari';
                         break;
                      case '03':
                         $Bulan = 'Maret';
                         break;
                      case '04':
                         $Bulan = 'April';
                         break;
                      case '05':
                         $Bulan = 'Mei';
                         break;
                      case '06':
                         $Bulan = 'Juni';
                         break;
                      case '07':
                         $Bulan = 'Juli';
                         break;
                      case '08':
                         $Bulan = 'Agustus';
                         break;
                      case '09':
                         $Bulan = 'September';
                         break;
                      case '10':
                         $Bulan = 'Oktober';
                         break;
                      case '11':
                         $Bulan = 'November';
                         break;
                      case '12':
                         $Bulan = 'Desember';
                         break;
                   }
                   ?>
			  		<div class="col-md-10 col-sm-12">
                      <h6>Laporan Tanggal <?=$tgl.' '.$Bulan.' '.$thn;?></h6>
                    </div>
			  		<div class="col-md-1 col-sm-12 col-md-offset-1">
                     <a href="<?php echo base_url()?>cetaklaporanharian/<?=$tgl."/".$bln."/".$thn?>" class="btn btn-success btn-sm" data-toggles="tooltip" title="Cetak Laporan" target="_blank"><i class="fa fa-print"></i></a>
                    </div>
			  <table id="tables2" class="table table-bordered table-striped table-responsive" cellspacing="0" width="100%">
				  <thead>
                        <tr>
                          <th width="2%">No.</th>
						  <th width="15%">Jenis Tugas</th>
                          <th width="20%">Kegiatan</th>
						  <th width="5%">Waktu</th>
                          <th width="5%">Output</th>
                          <th width="5%">Volume</th>
                          <th width="5%">Satuan</th>
						  <th class="none">Pemberi Tugas</th>
                          <th class="none">Keterangan</th>
                          <th class="none">Dokumen</th>
						  <th width="10%">Aksi</th>
                        </tr>
                    </thead>
				   <tbody>
					   <?php 
						$no =1;
						foreach ($tugas as $t) :
						?>
					   <tr>
						<td><?=$no++;?></td>
						<td><?=$t->nama_kriteria;?></td>
						<td><?=$t->kegiatan; ?></td>
						<td><?=$t->waktu; ?></td>
						<td><?=$t->output;?></td>
						<td><?=$t->jml; ?></td>
						<td><?=$t->satuan; ?></td>
						<td><?=$t->pemberi_tugas; ?></td>
						<td><?=$t->keterangan; ?></td>
						<td><?=$t->dokumen?>
						<?php if ($t->dokumen != 'Tidak Ada') {?>
                        <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                            <a href="<?php echo base_url().'tugas/download/'.$t->id_tugas; ?>" class=""><i class="fa fa-paperclip"></i><?=$t->dokumen?></a>
						<?php } else { ?>
							Tidak Ada
                        <?php } ?>
						</td>
						<td>
							<a class="btn btn-danger btn-action mr-1" data-toggle="modal" data-target="#ModalHapus<?=$t->id_tugas;?>" data-toggles="tooltip" title="Hapus"><span class="ion ion-trash-b"></span></a>   
						</td>
					   </tr>
				  		<?php endforeach; ?>
				   </tbody>
			  </table>
		  </div>
		</div>
	   </div>
	 </div>
  </div>
</section>