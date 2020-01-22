<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		is_login();
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('jabatan_model');

		date_default_timezone_set('ASIA/JAKARTA');
	}
		
	public function index()
	{
		$data = konfigurasi('Pengguna', 'Manajemen Penguna');
		$data['user']		= $this->user_model->get_user();
		$data['jabatan']    = $this->jabatan_model->getJabatan();
		$data['jabatan_selected'] = set_value('id_jabatan');
		//$data['departemen_selected'] = set_value('id_departemen');
		$this->template->load('master', 'datamaster/pengguna', $data);
	}

	public function status(){
		if(!is_numeric($this->uri->segment(3)) || !is_numeric($this->uri->segment(4)))
		{
			redirect('user');
		}
		$this->user_model->update_status('t_users', ['status' => $this->uri->segment(3)], ['id_user ' => $this->uri->segment(4)]);
		redirect('user');
	}

	function reset_pass()
	{	
		$id = $this->uri->segment(3);
		$get = $this->user_model->get_by_id($id);
		$user = $get->username;
		$pass = $get->tgl_lahir;
		$pisah = explode('-', $pass);
		$larik = array($pisah[2], $pisah[1],$pisah[0]);
		$satukan = implode("", $larik);
		$password = $satukan;
		$options = array('cost' => 4);
		$hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
		$data = array(
			'password' => $hashPassword,
		);
		$this->user_model->reset_pass($data, $id);
        echo $this->session->set_flashdata('msg', 'show-modal');
        echo $this->session->set_flashdata('uname', $user);  
        echo $this->session->set_flashdata('upass', $password);  
		redirect(site_url('user'));
	}
	

	public function rules()
	{	
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('full_name', 'Nama Pegawai', 'trim|required');
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$this->form_validation->set_rules('id_role','Level User', 'trim|required');
		$this->form_validation->set_message('required', '{field} wajib diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function _rules()
	{	
		
		$this->form_validation->set_rules('id_role','Level User', 'trim|required');
		//$this->form_validation->set_rules('id_jabatan','Jabatan', 'trim|required');
		$this->form_validation->set_message('required', '{field} wajib diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
	
	function simpan()
	{
		$this->rules();
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg','warning');
			redirect(site_url('user'));
		}else{
			if(! $this->user_model->isDuplicate($this->input->post('nip'))){
				$this->session->set_flashdata('msg', 'warning-duplicate-nip');
			 	redirect(base_url('user'));
		 	}else{
		 		$tanggal = $this->input->post('tgl_lahir');
				$pisah = explode('-', $tanggal);
				$larik = array($pisah[2], $pisah[1],$pisah[0]);
				$satukan = implode("", $larik);
				$password = $satukan;
				$options = array("cost" => 4);
				$hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

				$data = array(
					'full_name' => $this->input->post('full_name',TRUE),
					'username' => $this->input->post('username', TRUE),
					'nip' 		=> $this->input->post('nip', TRUE),
					'password'		=> $hashPassword,
					'id_role' => $this->input->post('id_role',TRUE),
					'id_jabatan' => $this->input->post('id_jabatan',TRUE),
					'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
					'status' 		=>1,
					'create_on' => date('Y-m-d H:i:s'),
					'images'  => "user.png",
					);
			//print_r($data);
			$this->user_model->insert($data);
			$this->session->set_flashdata('msg', 'success');
			redirect(site_url('user'));
			}
		}	
	}

	
	public function update(){
		$this->_rules();
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','warning');
			redirect(site_url('user'));
		}else{
			$data = array(
				'id_user'  => $this->input->post('id_user', TRUE),
				'id_role' => $this->input->post('id_role',TRUE),
				'id_jabatan' => $this->input->post('id_jabatan',TRUE),
			);
			
			$this->user_model->update($this->input->post('id_user', TRUE), $data);
			$this->session->set_flashdata('msg', 'success-update');  
			redirect(site_url('user'));	
		}
	}
	
	public function delete() 
    {
				$id = $_POST['id_user'];
				$data = $this->user_model->get_by_id($id);
				$u = $data->images;
				if ($u != "user.png") {
					$file_name = explode(".", $u)[0];
					array_map('unlink', glob(FCPATH."assets/admin/foto_profil/$u"));
				}
				
				$this->user_model->destroy($id);
				$this->session->set_flashdata('msg', 'success-hapus');
				redirect(site_url('user'));
    }
}

