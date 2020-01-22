<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_jabatan extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		//is_login();
		$this->load->model('tugas_model');
        //$this->load->model('konfigurasi_model');
				
	}
	
	function index()
	{
		date_default_timezone_set('ASIA/JAKARTA');
		$data = konfigurasi('Tugas', 'Tugas Jabatan');
		$idsess = $this->session->userdata('id_user');
		$bln = date('m-Y');
		$data['tugas'] = $this->tugas_model->getTugasPegawai($idsess,$bln);
		
		
		$this->template->load('master','bukupegawai/tugas_jabatan', $data);
	}
	
	function rules()
	{
		$this->form_validation->set_rules('kegiatan','Uraian Tugas', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('kuantitas','Output', 'trim|required');
		$this->form_validation->set_rules('satuan','Satuan', 'trim|required');
		$this->form_validation->set_rules('kualitas','Mutu', 'trim|required');
		//$this->form_validation->set_rules('waktu','Waktu 1 bulan','trim|required');
		
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
	
	function add()
	{
		date_default_timezone_set('ASIA/JAKARTA');
		$idsess = $this->session->userdata('id_user');
		$this->rules();
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg','error');
			//echo validation_errors();
			 redirect('tugas_jabatan');
			
		}else{
			$data = array(
				'id_user'  => $idsess,
				'kegiatan' => ucfirst($_POST['kegiatan']),
				'kuantitas' => $_POST['kuantitas'],
				'satuan'   => ucfirst($_POST['satuan']),
				'kualitas' => ucfirst($_POST['kualitas']),
				'waktu'    => 1,
				'create_at' => date('m-Y'),
			);
			//print_r($data);
			$this->tugas_model->insert_tugas($data);
			$this->session->set_flashdata('msg','success');
			redirect('tugas_jabatan');
		}
		
	}
	
	function update()
	{
		$id = $this->get('id');
		print_r($id);
	}
	
	
}