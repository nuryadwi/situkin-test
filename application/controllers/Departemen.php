<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->library('form_validation');
        $this->load->model('departemen_model');
		
    }
    
    public function rules()
    {   
        $this->form_validation->set_rules('departemen', 'Nama Departemen', 'trim|required');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    }
     
    public function index() 
    {
        $data = konfigurasi('Data Master', 'Kelola Data Departemen');
        $data['departemen'] =  $this->departemen_model->get_all('t_departemen')->result();
        $this->template->load('master', 'datamaster/departemen', $data);
    }

    public function simpan(){
        $this->rules();
        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg', 'error');
            redirect(site_url('departemen'));
        }else{
            $data = array(
                'nama_departemen' => $this->input->post('departemen', TRUE),
            );
            $this->departemen_model->insert($data);
            $this->session->set_flashdata('msg', 'success');
            redirect(site_url('departemen'));
        }
    }

    public function update(){
        $this->rules();
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg', 'warning');
            redirect(site_url('departemen'));
        }else{
            $data = array(
                'id_departemen' => $this->input->post('id_departemen'),
                'nama_departemen' => $this->input->post('departemen'),
            );

            $this->departemen_model->update($this->input->post('id_departemen', TRUE), $data);
            $this->session->set_flashdata('msg', 'success-update');  
            redirect(site_url('departemen'));
        }
    }



    public function delete() 
    {
		$id = $_POST['id_departemen'];
		$this->departemen_model->destroy($id);
        $this->session->set_flashdata('msg', 'success-hapus'); 
		redirect('departemen');
    }
}