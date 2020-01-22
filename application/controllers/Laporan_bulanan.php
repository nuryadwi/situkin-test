<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_bulanan extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		is_login();
		$this->load->library('form_validation');
		$this->load->model('bukupegawai_model');
		$this->load->model('tugas_model');
				
	}
	function index()
	{
		date_default_timezone_set('ASIA/JAKARTA');
		$data   = konfigurasi('Laporan', 'Laporan Tugas Bulanan');
		$idsess = $this->session->userdata('id_user');
		$this->input->post('cari');
		$this->form_validation->set_rules('bln', 'Bulan', 'required|numeric');
		$this->form_validation->set_rules('thn', 'Tahun', 'required|numeric');
		if ($this->form_validation->run()==TRUE) {
			$bln = $this->input->post('bln');
			$thn = $this->input->post('thn');
		}else{
			$bln = date('m');
			$thn = date('Y');
		}
		$awal  = '01-'.$bln.'-'.$thn;
        $akhir = '31-'.$bln.'-'.$thn;
        $where = ['tanggal >=' => $awal, 'tanggal <=' => $akhir,'t_tugas.id_user' => $idsess];
		$data['tugas'] = $this->bukupegawai_model->getTugasBulanan($where);
		$data['bln']   = $bln;
		$data['thn']   = $thn;
		
		$this->template->load('master','bukupegawai/laporan_bulanan', $data);
	}
}