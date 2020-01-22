<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		is_login();
		$this->load->model('tugas_model');
        $this->load->model('konfigurasi_model');
				
	}

	public function index()
	{	
		$this->input->post('cari', TRUE);
        $this->form_validation->set_rules('bln', 'Bulan', 'required|numeric');
		$this->form_validation->set_rules('thn', 'Tahun', 'required|numeric');
        
        if ($this->form_validation->run()==TRUE) {
            $bln = $this->input->post('bln', TRUE);
			$thn = $this->input->post('thn', TRUE);
        }else{
            $bln = date('m');
			$thn = date('Y');
        }
        $awal = $thn.'-'.$bln.'-01';
        $akhir = $thn.'-'.$bln.'-31';
        $where = ['tanggal >=' => $awal, 'tanggal <=' => $akhir, 'jml' => '1'];
        
        $data = konfigurasi('Laporan','Laporan Tugas Pegawai');
        $data['tugas'] = $this->tugas_model->report($where);
        $data['bln'] = $bln;
        $data['thn'] = $thn;

		$this->template->load('master','datatugas/tugas_laporan', $data);			
    }
    
    
    public function approve(){
        if(!is_numeric($this->uri->segment(3)) || !is_numeric($this->uri->segment(4)))
        {
            redirect('tugasmasuk');
        }
        $this->tugas_model->update_jml('t_tugas', ['jml' => $this->uri->segment(3)], ['id_tugas ' => $this->uri->segment(4)]);
        redirect('tugasmasuk');
    }

    public function download($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->tugas_model->download($id);
        $file = './assets/file_tambahan/'.$fileinfo['file_tambahan'];
        force_download($file, NULL);
    }

    function delete()
    {
        $id = $this->input->post('id_tugas');
        $this->tugas_model->destroy($id);
        $this->session->set_flashdata('msg','success-hapus');
        redirect('tugas');
    }

    function cetak($idbln,$idthn)
    {
        $awal = $idthn.'-'.$idbln.'-01';
        $akhir = $idthn.'-'.$idbln.'-31';

        $where = ['tanggal >=' => $awal, 'tanggal <=' => $akhir, 'jml' => '1'];
        $get = konfigurasi('');
        $data = $this->tugas_model->report($where);
        
        $this->load->library('pdf_tugas');
        $pdf= new PDF_Tugas('L', 'mm', 'A4');
        $pdf->AliasNbPages();
        $pdf->SetMargins(30,13,20); //top, left, right
        $pdf->AddPage();
        $pdf->Content();
        $pdf->Cell(1, 7, 'Bulan :'.bulan($idbln).' '.$idthn, 0, 1,'J');

        //set tabel
        $pdf->SetWidths(Array(10,30,20,32,20,20,15,30,25,40));
        $pdf->SetLineHeight(6);
        $pdf->SetAligns(Array('C','','','','C','C','C','C','C',''));
        $pdf->SetFont('Times', '',10);
        //tabel
        $pdf->Cell(10, 6, 'No.', 1, 0,'C');
        $pdf->Cell(30, 6, 'Nama Pegawai', 1, 0,'C');
        $pdf->Cell(20, 6, 'Jabatan', 1, 0,'C');
        $pdf->Cell(32, 6, 'Tugas', 1, 0,'C');
        $pdf->Cell(20, 6, 'Jam Mulai', 1, 0,'C');
        $pdf->Cell(20, 6, 'Jam Selesai', 1, 0,'C');
        $pdf->Cell(15, 6, 'Hari', 1, 0,'C');
        $pdf->Cell(30, 6, 'Tanggal', 1, 0,'C');
        $pdf->Cell(25, 6, 'Pemberi Tugas', 1, 0,'C');
        $pdf->Cell(40, 6, 'Keterangan', 1, 1,'C');
        //isi tabel
        $i=1;
        foreach ($data as $tugas) {
            $pdf->Row(Array(
                $i++,
                $tugas->full_name,
                $tugas->nama_jabatan." ".$tugas->nama_departemen,
                $tugas->tugas,
                $tugas->waktu_mulai,
                $tugas->waktu_selesai,
                hari($tugas->tanggal),
                date_indo($tugas->tanggal),
                $tugas->pemberi_tugas,
                $tugas->ket,
            ));
        }
        //catatan kaki
        $pdf->Cell(1, 20,'', 0, 1);
        $pdf->Cell(190);
        $pdf->Cell(50, 5, 'Bantul, '.tgl_new('d-m-Y '), 0, 1);
        $pdf->Cell(190);
        $pdf->Cell(47, 5, 'Pimpinan,', 0, 1);
        $pdf->Cell(1, 30, '', 0, 1);
        $pdf->Cell(190);
        $pdf->Cell(47, 5, $get['pimpinan'], 0, 1, 'C');

        $filename = 'Laporan Tugas Harian Pegawai Bulan-'.bulan($idbln).'-'.$idthn.'.pdf';
        $pdf->output($filename,'D');
    }
	
}
