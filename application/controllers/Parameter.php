<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameter extends CI_Controller {

    function __construct()
    {
        parent::__construct();
            is_login();
            $this->load->library('form_validation');
            $this->load->model('parameter_model');
    }

    function index()
    {
        $data = konfigurasi('Data Master','Kelola Data Parameter');
        $data['krit'] = $this->parameter_model->get_kriteria();

    	$this->template->load('master', 'masterpenilaian/parameter', $data);
    }

    function rules()
    {
		$this->form_validation->set_rules('min','Nilai Minimal', 'trim|required');
		$this->form_validation->set_rules('maks','Nilai Maksimal', 'trim|required');
		$this->form_validation->set_message('required', '{field} wajib diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


    public function simpan()
    {
    	$this->rules();
    	if ($this->form_validation->run() == FALSE) {
    		$this->session->set_flashdata('msg', 'error');
            $this->index();
    	}else{
    		$data = array(
    		'id_kriteria' => $_POST['id_kriteria'],
    		'min'	=> $_POST['min'],
    		'maks'   => $_POST['maks'],
            'type' => $_POST['type'],
    	);
            //var_dump($data);
    	$this->parameter_model->update($this->input->post('id_kriteria', TRUE), $data);
        $this->session->set_flashdata('msg', 'success');  
        redirect(site_url('parameter'));
    	}
    }

	public function delete() 
    {
		$id = $_POST['id_kriteria'];
		$this->parameter_model->destroy($id);
		$this->session->set_flashdata('msg', 'success-hapus'); 
		redirect('parameter');
    }
}