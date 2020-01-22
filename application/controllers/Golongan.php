<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
        $this->load->model('golongan_model');
		
    }
    
    public function rules()
    {   
        $this->form_validation->set_rules('golongan', 'Kode Golongan', 'trim|required');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required');
        $this->form_validation->set_rules('masa_kerja', 'Masa Kerja', 'trim|required');
        $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'trim|required');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    }
     
    public function index() {
        $data['data'] =  $this->golongan_model->get_all('t_golongan');
        $data['header'] = "Data Golongan";
    
        $this->template->load('master', 'golongan/golongan_list', $data);
    }


    public function create()
    {
        $data = array(
            'header' => 'Tambah Data Bagian',
            'button' => 'Tambah',
            'action' => site_url('golongan/create_action'),
        'golongan'   => set_value('golongan'),
        'pangkat'   => set_value('pangkat'),
        'masa_kerja' => set_value('masa_kerja'),
        'gaji_pokok' => set_value('gaji_pokok')
        
        );
        $this->template->load('master','golongan/golongan_form', $data);
    }

    public function create_action(){
        $this->rules();

        if( $this->form_validation->run() == FALSE) {
            $this->create();
        }else{
            $data = array(
                'golongan' => $this->input->post('golongan', TRUE),
                'pangkat'   => $this->input->post('pangkat', TRUE),
                'masa_kerja' => $this->input->post('masa_kerja', TRUE),
                'gaji_pokok' => $this->input->post('gaji_pokok', TRUE)
            );
            $this->golongan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Masuk
            </div>');
            redirect(site_url('golongan'));
        }
    }

    public function update($id){
        $row = $this->golongan_model->get_by_id($id);
        if($row) {
            $data = array(
                    'header' => "Update Golongan",
                    'button' => "Update",
                    'action' => site_url('golongan/update_action'),
                'id_golongan' => set_value('id_golongan', $row->id_golongan),
                'golongan' => set_value('golongan', $row->golongan),
                'pangkat' => set_value('pangkat', $row->pangkat),
                'masa_kerja' => set_value('masa_kerja', $row->masa_kerja),
                'gaji_pokok' => set_value('gaji_pokok', $row->gaji_pokok)
            );
            $this->template->load('master', 'golongan/golongan_form', $data);
        }else{
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('golongan'));
        }
    }

    public function update_action(){
        $this->rules();

        if($this->form_validation->run() == FALSE){
            $this->update($this->input->post('id_golongan', TRUE));
        }else{
            $data = array(
                'golongan' => $this->input->post('golongan', TRUE),
                'pangkat'   => $this->input->post('pangkat', TRUE),
                'masa_kerja' => $this->input->post('masa_kerja', TRUE),
                'gaji_pokok' => $this->input->post('gaji_pokok', TRUE)
            );
         
            $this->golongan_model->update($this->input->post('id_golongan', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Diupdate
            </div>');  
            redirect(site_url('golongan'));
        }
    }

    public function delete() 
    {
		$id = $this->uri->segment(3);
		$this->golongan_model->destroy($id);
		redirect('golongan');
    }

    

   

}