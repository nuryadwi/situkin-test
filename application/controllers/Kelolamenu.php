<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolamenu extends CI_Controller {

	function __construct()
    {
				parent::__construct();
				is_login();
				$this->load->library('form_validation');
				$this->load->model('menu_model');
		}
		
	public function index()
	{
		
		$data = konfigurasi('Menu','Kelola Menu');
		$data['action'] = site_url('kelolamenu/simpan_setting');
		$data['setting'] = $this->db->get_where('t_setting', array('id_setting' => 1))->row_array();
		$data['menu'] = $this->menu_model->get_all('t_menu');
		$this->template->load('master', 'setting/kelolamenu', $data);
	}

	function simpan_setting(){
        $value = $this->input->post('tampil_menu');
        $this->db->where('id_setting',1);
        $this->db->update('t_setting',array('value'=>$value));
        echo $this->session->set_flashdata('msg', 'success');
        redirect('kelolamenu');
    }

	public function rules()
	{
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('is_aktif','is_aktif', 'trim|required');
		$this->form_validation->set_message('required', '{field} wajib diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
	}

	function simpan()
	{
		$this->rules();
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', 'warning');
			redirect(site_url('kelolamenu'));
		} else{
			if (!empty($this->input->post('icon',TRUE))) {
				$data = array(
					'title'		=> $this->input->post('title', TRUE),
					'url' => $this->input->post('url',TRUE),
					'icon' => $this->input->post('icon',TRUE),
					'is_main_menu' => $this->input->post('is_main_menu',TRUE),
					'is_aktif' 		=> $this->input->post('is_aktif', TRUE),
				);
			}else{
				$data = array(
					'title'		=> $this->input->post('title', TRUE),
					'url' => $this->input->post('url',TRUE),
					'icon' => 'ion ion-ios-circle-outline',
					'is_main_menu' => $this->input->post('is_main_menu',TRUE),
					'is_aktif' 		=> $this->input->post('is_aktif', TRUE),
				);
			}
		//print_r($data);
		$this->menu_model->insert($data);
		echo $this->session->set_flashdata('msg', 'success');
		redirect(site_url('kelolamenu'));
		}
	}

	public function update(){
		$this->rules();
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg', 'warning');
			redirect(site_url('kelolamenu'));
		}else{
			if (!empty($this->input->post('icon',TRUE))) {
				$data = array(
					'id_menu'		=> $this->input->post('id_menu', TRUE),
					'title'		=> $this->input->post('title', TRUE),
					'url' => $this->input->post('url',TRUE),
					'icon' => $this->input->post('icon',TRUE),
					'is_main_menu' => $this->input->post('is_main_menu',TRUE),
					'is_aktif' 		=> $this->input->post('is_aktif', TRUE),
				);
			}else{
				$data = array(
					'id_menu'		=> $this->input->post('id_menu', TRUE),
					'title'		=> $this->input->post('title', TRUE),
					'url' => $this->input->post('url',TRUE),
					'icon' => 'ion ion-ios-circle-outline',
					'is_main_menu' => $this->input->post('is_main_menu',TRUE),
					'is_aktif' 		=> $this->input->post('is_aktif', TRUE),
				);
			}
			$this->menu_model->update($_POST['id_menu'], $data);
			$this->session->set_flashdata('msg', 'success-update');  
			redirect(site_url('kelolamenu'));
		}

	}

	public function delete() 
    {
		$id = $_POST['id_menu'];
		$this->menu_model->destroy($id);
		$this->menu_model->destroy_akses($id);
		$this->session->set_flashdata('msg', 'success-hapus');
		redirect('kelolamenu');
    }
}

