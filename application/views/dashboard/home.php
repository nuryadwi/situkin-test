<?php
if($this->session->userdata('id_role')==='1'){
  echo"<section class='section'>
          <h1 class='section-header'>
            <div>Dashboard"." ".$this->session->userdata('nama_role')."</div>
          </h1>";
  $this->load->view('dashboard/home_admin');
  echo "</section>";

}elseif($this->session->userdata('id_role')==='6'){
  echo"<section class='section'>
          <h1 class='section-header'>
            <div>Dashboard"." ".$this->session->userdata('nama_role')."</div>
          </h1>";
  $this->load->view('dashboard/home_op');
  echo "</section>";
}else{
  echo"<section class='section'>
          <h1 class='section-header'>
            <div>Dashboard"." ".$this->session->userdata('nama_role')."</div>
          </h1>";
  $this->load->view('dashboard/home_user');
  echo "</section>";
}
?>

<?php if ($this->session->userdata('id_role')==='2'): ?>
<!--modal kirim-->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5>Kirim Tugas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'bukupegawai/kirim'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body" style="height: 500px"> 
            <div class="form-group">
              <label for="inputNamaTugas">Nama Tugas</label>
                <input id="inputNamaTugas" type="text" class="form-control" name="tugas" placeholder="Nama Tugas" autofocus required >
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                  <label for="inputJam">Waktu mulai</label>
                    <input id="inputJam" type="time" class="form-control" name="waktu_mulai" autofocus required >
                </div>

                <div class="form-group col-md-6">
                  <label for="inputJam2">Waktu Selesai</label>
                    <input id="inputJam2" type="time" class="form-control" name="waktu_selesai" autofocus>
                </div>
            </div>
            <div class="row">
            <div class="form-group col-md-7">
              <label for="inputPemberi">Pemberi Tugas</label>
                <input id="inputPemberi" type="text" class="form-control" name="pemberi_tugas" placeholder="Pemberi Tugas" autofocus>
            </div>

            <div class="form-group col-md-5">
              <label for="inputTanggal">Tanggal</label>
                <input id="inputTanggal" type="date" class="form-control" name="tanggal" placeholder="Pemberi Tugas" autofocus>
            </div>
            
          </div>

            <div class="form-group">
              <label for="inputPemberi">File Tambahan</label>
                <input type="file" name="files" id="files" class="form-control" value="">
                <span style="color:red;"><b>*</b>Lampirkan bila perlu</span>
            </div>

            <div class="form-group">
              <label for="inputKeterangan">Keterangan</label>
                <textarea name="keterangan" id="inputKeterangan" class="form-control" rows="3"></textarea>
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
<?php endif ?>
