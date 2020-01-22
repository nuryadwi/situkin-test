<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukupegawai extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		is_login();
		$this->load->library('form_validation');
		$this->load->model('bukupegawai_model');
		$this->load->model('tugas_model');
				
	}

	public function index()
	{	
		date_default_timezone_set('ASIA/JAKARTA');
		$idsess = $this->session->userdata('id_user');
		$bln = date('m');
		$thn = date('Y');
		$awal = $thn.'-'.$bln.'-01';
        $akhir =$thn.'-'.$bln.'-31';
		$jml = $this->bukupegawai_model->getJmlTugasPegawai($awal,$akhir,$idsess);

		$data = konfigurasi('Buku Pegawai','Daftar Tugas');
		$data['buku'] = $this->bukupegawai_model->getBukuPegawai($idsess);
		$data['jml_tugas_acc'] = $jml->tugas1;
		$data['jml_tugas_blm'] = $jml->tugas2;
		$this->template->load('master', 'bukupegawai/buku_tugas', $data);
	}

	public function input()
	{
		date_default_timezone_set('ASIA/JAKARTA');
		$id = $this->session->userdata('id_user');
		$this->rules();
		$file = $this->upload_file();
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg','warning');
			redirect(site_url('bukupegawai'));
		}else{
			$data = array(
				'id_user' => $id,
				'jenis_tugas' => $this->input->post('jenis_tugas'),
				'tanggal'  => $this->input->post('tanggal'),
				'kegiatan' => $this->input->post('kegiatan'),
				'output' => $this->input->post('output'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
				'keterangan' => $this->input->post('keterangan'),
				'pemberi_tugas' => $this->input->post('pemberi_tugas'),
				'dokumen' => $file,
				'create_at' =>date('Y-m-d H:i:s'),
			);
		print_r($data);
//			$this->bukupegawai_model->insert($data);
//            $this->session->set_flashdata('msg', 'success-kirim>');
//            redirect(site_url('laporantugasharian'));

		}
		
	}

	public function rules()
	{
		
		$this->form_validation->set_rules('kegiatan', 'kegiatan', 'trim|required');
		$this->form_validation->set_rules('pemberi_tugas', 'pemberi_tugas', 'trim|required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	private function upload_file()
	{
		$nama = $this->session->userdata('full_name');
		$config['upload_path']          = './assets/file_tambahan';
        $config['allowed_types']        = 'doc|docx|xls|jpg|png';
        $config['file_name']            = 'file-'.$_POST['kegiatan'].'-'.$nama.'-'.date('d-m-Y');
        $config['overwrite']            = 'true';
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('files')) {
        	return $this->upload->data('file_name');
        }
        return "Tidak Ada";
        
	}

}