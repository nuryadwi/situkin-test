<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_harian extends CI_Controller {

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
		$data = konfigurasi('Laporan', 'Laporan Tugas Harian');
		$this->input->post('cari');
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required|numeric');
		$this->form_validation->set_rules('bln', 'Bulan', 'required|numeric');
		$this->form_validation->set_rules('thn', 'Tahun', 'required|numeric');
		if ($this->form_validation->run()==TRUE) {
			$tgl = $this->input->post('tgl');
			$bln = $this->input->post('bln');
			$thn = $this->input->post('thn');
		}else{
			$tgl = date('d');
			$bln = date('m');
			$thn = date('Y');
		}
		$tanggal = $tgl.'-'.$bln.'-'.$thn;
		$data['tugas'] = $this->bukupegawai_model->getTugasHarian($tanggal);
		
		$data['tgl'] = $tgl;
		$data['bln'] = $bln;
		$data['thn'] = $thn;
		
		$this->template->load('master','bukupegawai/laporan_harian', $data);
	}

}