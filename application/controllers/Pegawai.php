<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
        $this->load->model('user_model');
		
	}
    function index() {
        
        $data = konfigurasi('Data Pegawai','Daftar Pegawai');
        $data['pegawai'] = $this->user_model->get_pegawai();
        $this->template->load('master', 'datamaster/pegawai_list', $data);
    }

    function cetak()
    {

    }

}