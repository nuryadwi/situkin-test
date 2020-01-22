<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smart_report extends CI_Controller {

    function __construct()
    {
        parent::__construct();
            //is_login();
            $this->load->library('form_validation');
            $this->load->model('smart_model');
            $this->load->model('kriteria_model');
            $this->load->model('konfigurasi_model');
    }

    function index()
    {
    	$data = konfigurasi('Laporan','Hasil Pernilaian');
    	$data['kriteria'] = $this->kriteria_model->get_all('t_kriteria')->result();
    	$data['alternatif'] = $this->smart_model->get_alter();

    	$this->template->load('master', 'penilaian/smart_report', $data);
    }

    function cetak()
    {
        $krit = $this->kriteria_model->get_all('t_kriteria')->result();
        $alt = $this->smart_model->get_alter();
        $get = konfigurasi('');
        $this->load->library('pdf_penilaian');
        $pdf= new PDF_Penilaian('L', 'mm', 'A4');
        $pdf->AliasNbPages();
        $pdf->SetMargins(30,18,20); //top, left, right
        $pdf->AddPage();
        $pdf->Content();
        $pdf->Cell(1, 7, 'NILAI DASAR', 0, 1);
        $pdf->Cell(7, 7, 'No.', 1, 0,'C');
        $pdf->Cell(42, 7, 'Pegawai', 1, 0, 'C');
        $pdf->Cell(45, 7, 'Jabatan', 1, 0, 'C');
        foreach ($krit as $k) {
            $pdf->Cell(15, 7, $k->kriteria, 1, 0, 'C');
        }
        $pdf->Cell(27, 7, 'Tugas Terkumpul', 1, 1,'C');
        $i=1;
        foreach ($alt as $a) {
        $pdf->Cell(7, 7, $i++, 1, 0,'C');
        $pdf->Cell(42, 7, $a->full_name, 1, 0);
        $pdf->Cell(45, 7, $a->nama_jabatan." ".$a->nama_departemen, 1, 0);
        foreach ($krit as $k) {
            $query = $this->db->query("select * from t_alternatif_kriteria where id_kriteria='".$k->id_kriteria."' and id_alternatif='".$a->id_alternatif."'");
            $altkri = $query->result();
            if (!empty($altkri)) {
               foreach ($altkri as $alt2) {
                    $pdf->Cell(15, 7, round($alt2->nilai_alternatif_kriteria,3), 1, 0, 'C');
                    }
            }else{
                $pdf->Cell(15, 7,'-', 1, 0, 'C');
            }
         }
         //ambil jumlah tugas
          $bln = date('m');
          $thn = date('Y');
          $awal = $thn.'-'.$bln.'-01';
          $akhir = $thn.'-'.$bln.'-31';
          $where = ['tanggal >=' => $awal, 'tanggal <=' => $akhir, 't_tugas.id_user' => $a->id_user];
          $this->db->select_sum('jml','jumlah');
          $this->db->from('t_tugas');
          $this->db->where($where);
          $jml = $this->db->get()->row();

        $pdf->Cell(27, 7, $jml->jumlah, 1, 1, 'C');
        }
         //keterangan
        $pdf->Cell(30, 7, '', 0, 1);
        $pdf->Cell(30, 7, 'Keterangan Kriteria', 0, 0,'J');
        $pdf->Cell(30, 7, '', 0, 1);

        $pdf->SetWidths(Array(7,15,70));
        $pdf->SetLineHeight(5);
        $pdf->SetAligns(Array('C','C','L'));
        $pdf->Cell(7, 7, 'No.', 1, 0,'C');
        $pdf->Cell(15, 7, 'Kode', 1, 0,'C');
        $pdf->Cell(70, 7, 'Deskripsi', 1, 1, 'C');
        
        $pdf->SetFont('Arial', '',10);
        //isi
        $i=1;
        foreach ($krit as $k3) {
            $pdf->Row(Array(
                $i++,
                $k3->kriteria,
                $k3->deskripsi,
            ));
        }

        $pdf->AddPage();
        $pdf->Content();
        $pdf->Cell(1, 7, 'URAIAN PENILAIAN', 0, 1);
        $pdf->Cell(7, 7, 'No.', 1, 0,'C');
        $pdf->Cell(53, 7, 'Pegawai', 1, 0, 'C');
        foreach ($krit as $k) {
            $pdf->Cell(15, 7, $k->kriteria, 1, 0, 'C');
        }
        $pdf->Cell(15, 7, 'Hasil', 1, 0,'C');
        $pdf->Cell(45, 7, 'Keterangan', 1, 1,'C');
        //tampil baris bobot
        $pdf->Cell(7, 7, '-', 1, 0,'C');
        $pdf->Cell(53, 7, 'Bobot Normalisasi', 1, 0, 'C');
        foreach ($krit as $k2) {
           $pdf->Cell(15, 7, round($k2->bobot_rerata,3), 1, 0, 'C'); 
        }
        $pdf->Cell(15, 7, '-', 1, 0,'C');
        $pdf->Cell(45, 7, '-', 1, 1,'C');
        //tampil hasil
        $i =1;
        foreach ($alt as $a2) {
        $pdf->Cell(7, 7, $i++, 1, 0,'C');
        $pdf->Cell(53, 7, $a2->full_name, 1, 0);
            foreach ($krit as $k) {
                $query = $this->db->query("select * from t_alternatif_kriteria where id_kriteria='".$k->id_kriteria."' and id_alternatif='".$a2->id_alternatif."'");
                $altkri2 = $query->result();
                if (!empty($altkri2)) {
                    foreach ($altkri2 as $alt3){
                        $pdf->Cell(15, 7, round($alt3->bobot_alternatif_kriteria,3), 1, 0, 'C');   
                    }
                }else{
                    $pdf->Cell(15, 7, '-', 1, 0, 'C'); 
                }
            }
            //if nilai kosong
            if (!empty($altkri2)) {
                $pdf->Cell(15, 7, $a2->hasil_alternatif, 1, 0,'C');
            }else{
                $pdf->Cell(15, 7, '-', 1, 0,'C');
            }
            //tampil keterangan
            $pdf->Cell(45, 7, $a2->ket_alternatif, 1, 1,'C');
        }

       

        //catatan kaki
        $pdf->Cell(1, 20,'', 0, 1);
        $pdf->Cell(175);
        $pdf->Cell(55, 5, 'Bantul, '.tgl_new('d-m-Y '), 0, 1);
        $pdf->Cell(175);
        $pdf->Cell(47, 5, 'Pimpinan', 0, 1);
        $pdf->Cell(1, 30, '', 0, 1);
        $pdf->Cell(175);
        $pdf->Cell(47, 5, $get['pimpinan'], 0, 1, 'C');


        
        $filename = 'Laporan Penilaian Pegawai-'.date('d-m-Y').'.pdf';
        $pdf->Output($filename,'D');
    }
}