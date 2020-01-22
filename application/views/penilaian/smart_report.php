<section class="section">
  <h1 class="section-header">
    <div><?=$c_des?></div>
  </h1>
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
                   <a href="<?=base_url();?>cetaklaporanpenilaian" class="btn btn-success btn-sm"data-toggles="tooltip" title="Cetak" target="_blank"><i class="ion ion-ios-printer-outline"></i>&nbsp;pdf</i></a> 
                </div>
            <div class="card-body p-3">
                <table id="tables" class="table table-bordered table-striped table-responsive">
                       <thead>
                        <tr>
                          <th width="2%">No</th>
                          <th width="15%">Pegawai</th>
                          <th width="10%">Jabatan</th>
                            <?php foreach($kriteria as $krit) : ?>
                            <th width="5%"><?=$krit->kriteria;?></th>
                            <?php endforeach?>
                          </th>
                          <th width="5%">Hasil</th>
                          <th width="10%">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td>#</td>
                          <td><b>Bobot Normalisasi</b></td>
                          <td>#</td>
                          <?php foreach ($kriteria as $kri) {?>
                            <td><b><?=round($kri->bobot_rerata,3)?></b></td>
                          <?php }?>
                          <td>-</td>
                          <td>-</td>
                        </tr>
                            <?php
                            $i=1;
                            foreach ($alternatif as $alt):
                            ?>                
                            <tr>
                              <td style="vertical-align:middle"><?=$i++;?></td>
                              <td style="vertical-align:middle"><?=$alt->full_name;?></td>
                              <td style="vertical-align:middle"><?=$alt->nama_jabatan." ".$alt->nama_departemen;?></td>
                              <?php foreach ($kriteria as $krit): ?>
                              <td style="vertical-align:middle">
                                <?php
                                  $query = $this->db->get_where('t_alternatif_kriteria', array('id_kriteria' => $krit->id_kriteria,'id_alternatif' => $alt->id_alternatif));
                                  $altkriteria = $query->result();
                                  foreach ($altkriteria as $utl) {
                                     echo round($utl->bobot_alternatif_kriteria,2);
                                   } 
                                ?>
                              </td>
                              <?php endforeach ?>
                              <td style="vertical-align:middle">
                                <?php 
                                  $query = $this->db->query("SELECT CAST(SUM(bobot_alternatif_kriteria) AS DECIMAL(12,2)) AS bobot_utility FROM t_alternatif_kriteria WHERE id_alternatif='".$alt->id_alternatif."'");
                                  $utl2 = $query->row();
                                  $ida = $alt->id_alternatif;
                                  echo"<b>".round($hsl = $utl2->bobot_utility,2);

                                  if ($hsl >= 50.00) {
                                    $ket = "Mendapat Tunjangan";
                                  }else{
                                    $ket = "Tidak Mendapat Tunjangan";
                                  }
                                  $data = array(
                                    'hasil_alternatif' => $hsl,
                                    'ket_alternatif'   => $ket,
                                    'id_alternatif'    => $ida,
                                  );
                                  $this->db->set('hasil_alternatif', 'ket_alternatif');
                                  $this->db->where('id_alternatif', $ida);
                                  $this->db->update('t_alternatif', $data);
                                ?>
                              </td>
                              <td style="vertical-align:middle">
                                <?php
                                    if ($hsl>=50.00) {
                                      $ket2 = "<span class='badge badge-success'>Mendapat Tunjangan</span>"; 
                                    }else{
                                      $ket2 = "<span class='badge badge-danger'>Tidak Dapat Tunjangan</span>";
                                    }
                                    echo $ket2;
                                  ?>
                              </td>
                            </tr>
                          <?php endforeach?>
                    </tbody>
                  </table>
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
                            foreach ($kriteria as $k) :?>
                            <ul>
                              <li><?=$k->kriteria.': '.$k->nama_kriteria?></li>
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