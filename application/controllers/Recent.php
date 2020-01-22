<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recent extends CI_Controller {

    function __construct()
    {
		parent::__construct();
        is_login();
        $this->load->model('tugas_model');
		
	}

    function index()
    {
        $bln = date('m');
        $thn = date('Y');
        $awal = $thn.'-'.$bln.'-01';
        $akhir = $thn.'-'.$bln.'-31';
        $data = konfigurasi('Data Tugas','Tugas Masuk');
        
        $data['recent'] = $this->tugas_model->get_recent();
        $this->template->load('master', 'datatugas/recent_tugas', $data);
    }

}