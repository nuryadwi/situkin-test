<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		is_login();
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$data = konfigurasi('Konfigurasi', 'Setting Aplikasi');
		$data['konfig'] = $this->konfigurasi_model->get_konfig();
		$this->template->load('master', 'setting/konfigurasi', $data);
	}

	function rules()
	{
		$this->form_validation->set_rules('nama', 'Nama Website', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'No. Telepon', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('instansi', 'Nama Instansi', 'trim|required');
		$this->form_validation->set_rules('pimpinan', 'Nama Pimpinan', 'trim|required');
		$this->form_validation->set_rules('sekretaris', 'Nama Sekretaris', 'trim|required');

		$this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	function simpan()
	{
		$this->rules();
		$logo = $this->upload_logo();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		}else{
			if (!empty($_FILES["logo"]["name"])) {
				$data = array(
					'id_konfigurasi' => $_POST['id_konfigurasi'],
					'name_app'   => $_POST['nama'],
					'email'			 => $_POST['email'],
					'phone'			 => $_POST['phone'],
					'alamat'		 => $_POST['alamat'],
					'instansi'		 => $_POST['instansi'],
					'pimpinan'		 => $_POST['pimpinan'],
					'sekretaris'		 => $_POST['sekretaris'],
					'about'			 => $_POST['about'],
					'logo'			 => $logo['file_name']
				);
			}else{
				$data = array(
					'id_konfigurasi' => $_POST['id_konfigurasi'],
					'name_app'   	 => $_POST['nama'],
					'email'			 => $_POST['email'],
					'phone'			 => $_POST['phone'],
					'alamat'		 => $_POST['alamat'],
					'instansi'		 => $_POST['instansi'],
					'pimpinan'		 => $_POST['pimpinan'],
					'sekretaris'		 => $_POST['sekretaris'],
					'about'			 => $_POST['about'],
					'logo'			 => $_POST['old_images']
				);
			}
			//print_r($data);
			$this->konfigurasi_model->update($_POST['id_konfigurasi'], $data);
			echo $this->session->set_flashdata('msg', 'success');
			redirect(site_url('setting'));
		}

	}

	function upload_logo()
	{
		$config['upload_path']          = './assets/img_app';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = "logo"."-".$_POST['nama'];
        $config['overwrite']            = 'true';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('logo')) {
            $gbr = $this->upload->data();
            //compress
            $config['image_library'] ='gd2';
            $config['source_image'] = './assets/img_app/'.$gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '50%';
            $config['width'] = '250';
            $config['height'] = '250';
            $config['new_image'] = './assets/img_app/'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            return $gbr;
        }
        return "logo.png";
	}
}