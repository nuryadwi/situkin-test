<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

    function __construct()
    {
        parent::__construct();
            is_login();
            $this->load->library('form_validation');
            $this->load->model('jabatan_model');
    }
    
    public function rules()
    {
        $this->form_validation->set_rules('jabatan', 'Nama Jabatan','trim|required');
        $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'trim');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

	public function index()
	{   

        $data = konfigurasi('Data Master', 'Kelola Data Jabatan');
        $data['jabatan'] = $this->jabatan_model->getJabatan();
        #load template
        $this->template->load('master', 'datamaster/jabatan', $data);
    }

    public function simpan(){
        $this->rules();
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg', 'error');
            redirect(site_url('jabatan'));
        }else{
                $data = array(
                'nama_jabatan' => $this->input->post('jabatan', TRUE),
                'id_departemen' => $this->input->post('id_departemen', TRUE),
            );
            $this->jabatan_model->insert($data);
            $this->session->set_flashdata('msg', 'success');
            redirect(site_url('jabatan'));
              
        }
    }

    public function update(){
        $this->rules();

        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg', 'warning');
            redirect(site_url('jabatan'));
        }else{
            $data = array(
                'id_jabatan' => $this->input->post('id_jabatan',TRUE),
                'nama_jabatan' => $this->input->post('jabatan',TRUE),
                'id_departemen' => $this->input->post('id_departemen',TRUE),
            );
            
            $this->jabatan_model->update($this->input->post('id_jabatan', TRUE), $data);
            $this->session->set_flashdata('msg', 'success-update');  
            redirect(site_url('jabatan'));
        }
    }
    public function delete() 
    {
		$id = $_POST['id_jabatan'];
		$this->jabatan_model->destroy($id);
        $this->session->set_flashdata('msg', 'success-hapus');
		redirect('jabatan');
    }

}