<?php
function cmb_dinamis($name,$table,$field,$pk,$selected=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>"."<option value='0'>--Silakan Pilih--</option>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function konfigurasi($title,$c_des=null)
{
    $ci = get_instance();
    $ci->load->model('konfigurasi_model');
    $site = $ci->konfigurasi_model->listing();
    $data = array(
        'title'     => $site['name_app'].' | '.$title,
        'logo'      => $site['logo'],
        'email'     => $site['email'],
        'phone'     => $site['phone'],
        'email'     => $site['email'],
        'alamat'    => $site['alamat'],
        'instansi'  => $site['instansi'],
        'pimpinan' => $site['pimpinan'],
        'sekretaris'  => $site['sekretaris'],
        'metatext'  => $site['metatext'],
        'about'     => $site['about'],
        'site'      => $site,
        'c_judul'   => $title,
        'c_des'     => $c_des,
    );
    return $data;
}

// untuk chek akses level pada modul peberian akses
function checked_akses($id_role,$id_menu){
    $ci = get_instance();
    $ci->db->where('id_role',$id_role);
    $ci->db->where('id_menu',$id_menu);
    $data = $ci->db->get('t_hak_akses');
    if($data->num_rows()>0){
        return "checked='checked'";
    }
}


function is_login(){
    $ci = get_instance();
    if(!$ci->session->userdata('id_user')){
        redirect('auth');
    }else{
        $modul = $ci->uri->segment(1);
        
        $id_role = $ci->session->userdata('id_role');
        // dapatkan id menu berdasarkan nama controller
        $menu = $ci->db->get_where('t_menu',array('url'=>$modul))->row_array();
        $id_menu = $menu['id_menu'];
        // chek apakah user ini boleh mengakses modul ini
        $hak_akses = $ci->db->get_where('t_hak_akses',array('id_menu'=>$id_menu,'id_role'=>$id_role));
        if($hak_akses->num_rows()<1){
            redirect('blokir');
            exit;
        }
    }
}

function alert($class,$title,$description){
    return '<div class="alert '.$class.' alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> '.$title.'</h4>
                '.$description.'
              </div>';
}

function rename_string_is_aktif($string){
        return $string=='y'?'Aktif':'Tidak Aktif';
    }
function rename_string_status($string){
        return $string=='1'?'Aktif':'Tidak Aktif';
    }
function rename_string_tipe($string){
        if ($string==1) {
            echo "Benefit Criteria";
        }elseif($string==2){
            echo "Cost Criteria";
        }else{
          echo "-";
        }
    }

function rename_string_user($string){
       if ($string==1) {
            echo "Administrator";
        }elseif($string==6){
            echo "Operator";
        }elseif($string==2){
          echo "pegawai";
        }else{
          
        }
    }

//format tanggal hari ini lengkap
function tgl_new()
{
    date_default_timezone_set('Asia/Jakarta');
    /* script menentukan hari */
    $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
    $hr = $array_hr[date('N')];
    /* script menentukan tanggal */
    $tgl= date('j');
    /* script menentukan bulan */
    $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
    $bln = $array_bln[date('n')];
    /* script menentukan tahun */
    $thn = date('Y');
    /* script perintah keluaran*/
    return $hr . ", " . $tgl . " " . $bln . " " . $thn;
}

//ubah format tanggal dari form
function ubah_tgl($tanggal)
{
  $pisah = explode('/', $tanggal);
  $larik = array($pisah[2],$pisah[0],$pisah[1]);
  $satukan = implode('-', $larik);
  return $satukan;
}

//merubah tanggal sesuai dengan format indonesia

function date_indo($tanggal)
{
    $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tgl = $pecah[2];
    $bln = bulan($pecah[1]);
    $thn = $pecah[0];

    return $tgl.' '.$bln.' '.$thn;
}

function date_recent($tanggal)
{
    $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    
    $thn = $pecah[0];
    $bln = bulan($pecah[1]);
    $get_tgl = $pecah[2];
    $pecah2 = explode(" ", $get_tgl);
    $time = $pecah2[1];
    $tgl = $pecah2[0];

    return $time.' '.$tgl.' '.$bln;
}

function moon($tanggal)
{
    $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $bln = bulan($pecah[1]);

    return $bln;
}

function tgl_angka($tanggal)
{
    $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tgl = $pecah[2];
    $angka = $tgl;
    return $angka;
}

//ambil hari

function hari($tanggal)
{
    $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tgl = $pecah[2];
    $bln = $pecah[1];
    $thn = $pecah[0];
    $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
    $nama_hari = "";
    if ($nama == "Sunday") {
        $nama_hari = "Minggu";
    } elseif ($nama == "Monday") {
        $nama_hari = "Senin";
    } elseif ($nama == "Tuesday") {
        $nama_hari = "Selasa";
    } elseif ($nama == "Wednesday") {
        $nama_hari = "Rabu";
    } elseif ($nama == "Thursday") {
        $nama_hari = "Kamis";
    } elseif ($nama == "Friday") {
        $nama_hari = "Jumat";
    } elseif ($nama == "Saturday") {
        $nama_hari = "Sabtu";
    }
    return $nama_hari;
}

//bulan
function bulan($bln)
{
    switch ($bln) {
      case 1:
      return "Januari";
      break;
      case 2:
      return "Februari";
      break;
      case 3:
      return "Maret";
      break;
      case 4:
      return "April";
      break;
      case 5:
      return "Mei";
      break;
      case 6:
      return "Juni";
      break;
      case 7:
      return "Juli";
      break;
      case 8:
      return "Agustus";
      break;
      case 9:
      return "September";
      break;
      case 10:
      return "Oktober";
      break;
      case 11:
      return "November";
      break;
      case 12:
      return "Desember";
      break;
    }
}








