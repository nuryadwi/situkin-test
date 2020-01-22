<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Raport extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->model('kriteria_model');
        $this->load->model('bukupegawai_model');
        $this->load->model('smart_model');
        $this->load->model('konfigurasi_model');
        $this->load->model('tugas_model');

    }

    public function cari()
    {
        $id_skp=$_GET['id_skp'];
        $cari =$this->tugas_model->cari($id_skp)->result();
        echo json_encode($cari);
    }

    function index()
    {   
        $idsess = $this->session->userdata('id_user');
        $row1 = $this->user_model->get_user_by_id($idsess);
        $row2 = $this->bukupegawai_model->get_ket($idsess);
        
        $data = konfigurasi('Raport','Hasil Penilaian');
        $data['nip'] = $row1->nip;
        $data['nama'] = $row1->full_name;
        $data['jabatan'] = $row1->nama_jabatan." ".$row1->nama_departemen;
        $data['keterangan'] = $row2->ket_alternatif;
        $data['kriteria'] = $this->kriteria_model->get_kriteria();

        $this->template->load('master', 'bukupegawai/raport_pegawai', $data);
    }

    function cetak()
    {
        $id = $this->session->userdata('id_user');
        $get = konfigurasi('');
        $row1 = $this->user_model->get_user_by_id($id);
        $row2 = $this->smart_model->get_nilai($id);

        $this->load->library('pdf_raport');
        $pdf= new PDF_Raport('P', 'mm', 'A4');
        $pdf->AliasNbPages();
        $pdf->SetMargins(30,10,20); //top, left, right
        $pdf->AddPage();
        $pdf->Content();

        $pdf->Cell(1, 7, 'STAFF YANG DINILAI', 0, 1);
        $pdf->Cell(1, 5, 'NIP                    :'.$row1->nip, 0, 1);
        $pdf->Cell(1, 5, 'Nama                 :'.$row1->full_name, 0, 1);
        $pdf->Cell(1, 5, 'Jabatan               :'.$row1->nama_jabatan.' '.$row1->nama_departemen, 0, 1);
        $pdf->Cell(1, 5, 'Unit Organisasi :'.$get['instansi'], 0, 1);
        $pdf->Cell(1, 7, '', 0, 1);
        $pdf->Cell(1, 7, 'UNSUR YANG DINILAI', 0, 1);

        //konfigurasi tabel
        $pdf->SetWidths(Array(8,30,80,20,15));
        $pdf->SetLineHeight(6);
        $pdf->SetAligns(Array('C','','','C','C'));

        //tabel
        $pdf->Cell(8, 7, 'No.', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Kriteria', 1, 0, 'C');
        $pdf->Cell(80, 7, 'Deskripsi', 1, 0, 'C');
        $pdf->Cell(20, 7, 'Penilaian', 1, 0, 'C');
        $pdf->Cell(15, 7, 'Nilai', 1, 1, 'C');
        // isi tabel
        $i=1;
        foreach ($row2 as $isi) {
            $pdf->Row(Array(
                $i++,
                $isi->nama_kriteria,
                $isi->deskripsi,
                $isi->nilai_awal,
                round($isi->nilai_alternatif_kriteria,2),
            ));
        }
        $pdf->Cell(1, 5, '', 0, 1);
        $pdf->Cell(1, 7, 'URAIAN PENILAIAN', 0, 1);
        //konfigurasi tabel
        $pdf->SetWidths(Array(8,50,30,30));
        $pdf->SetLineHeight(6);
        $pdf->SetAligns(Array('C','','C','C'));
        // tabel 2
        $pdf->Cell(8, 7, 'No.', 1, 0, 'C');
        $pdf->Cell(50, 7, 'Kriteria', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Bobot', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Nilai', 1, 1, 'C');
        // isi tabel 2
        $i=1;
        foreach ($row2 as $isi2) {

            $pdf->Row(Array(
                $i++,
                $isi2->nama_kriteria,
                round($isi2->bobot_rerata,3),
                round($isi2->bobot_alternatif_kriteria,2),


            ));
        }

        $pdf->Cell(58, 9, 'Hasil Hitung Metode SMART', 1, 0, 'C');
        $pdf->Cell(30, 9, '', 1, 0, 'C');
        $pdf->Cell(30, 9, $isi->hasil_alternatif, 1, 1, 'C');

        $pdf->SetFont('Arial','B', 10);
        $pdf->Cell(1, 5, '', 0, 1);
    
        $pdf->Cell(100, 15, 'KEPUTUSAN :'.$isi->ket_alternatif, 1, 1, 'C');

        $pdf->SetFont('Times','', 9);
        $pdf->Cell(1, 7, '', 0, 1);
        $pdf->Cell(110);
        $pdf->Cell(48, 7, 'Bantul ,'.tgl_new('d-m-Y '), 0, 1);

        $filename = 'Raport Pegawai-'.$row1->full_name.'-'.bulan(date('m')).'-'.date('Y').'.pdf';
        $pdf->Output($filename,'D');
    }
}
