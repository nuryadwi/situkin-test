<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kirim_tugas extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		//is_login();
		$this->load->library('form_validation');
		$this->load->model('bukupegawai_model');
		$this->load->model('tugas_model');
				
	}
	function index()
	{
	  $data = konfigurasi('Tugas','Input Tugas Harian');
	  $idsess = $this->session->userdata('id_user');
	  $bln = date('m-Y');
	  $data['skp'] = $this->tugas_model->getTugasPegawai($idsess,$bln);
	  $data['tugas_selected'] = set_value('id_skp');
	  $this->template->load('master','bukupegawai/tugas_harian',$data);
	}
	
	
	public function rules()
	{
		
		$this->form_validation->set_rules('kegiatan', 'kegiatan', 'trim|required');
		$this->form_validation->set_rules('pemberi_tugas', 'pemberi_tugas', 'trim|required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
	
	function input()
	{
		date_default_timezone_set('ASIA/JAKARTA');
		$id = $this->session->userdata('id_user');
		$this->rules();
		$file = $this->upload_file();
		$waktu = $_POST['jam_mulai'].' s/d '.$_POST['jam_selesai'];
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','warning');
			redirect('kirimtugas');
		}else{
			$data = array(
				'id_user' => $id,
				'id_kriteria' => $this->input->post('id_kriteria'),
				'tanggal' => $this->input->post('tanggal'),
				'dokumen' => $file,
				'waktu' => $waktu,
				'kegiatan' => $this->input->post('kegiatan'),
				'output' => $this->input->post('output'),
				'jml' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
				'keterangan' =>$this->input->post('keterangan'),
				'pemberi_tugas' => $this->input->post('pemberi_tugas'),
				'create_at' =>date('Y-m-d H:i:s'),
			);
			//print_r($data);
			$this->tugas_model->insert($data);
            $this->session->set_flashdata('msg', 'success-kirim>');
            redirect('laporantugasharian');
		}
	}
	
	private function upload_file()
	{
		$nama = $this->session->userdata('full_name');
		$config['upload_path']          = './assets/file_tambahan';
        $config['allowed_types']        = 'doc|docx|xls|jpg|png|rar|zip';
        $config['file_name']            = 'file-'.$_POST['kegiatan'].'-'.$nama.'-'.date('d-m-Y');
        $config['overwrite']            = 'true';
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('files')) {
        	return $this->upload->data('file_name');
        }
        return "Tidak Ada";
        
	}
}