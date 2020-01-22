<?php
class Blokir extends CI_Controller{
    
    
    function index(){
    	$data = konfigurasi('Blokir');
        $this->load->view('auth/blokir_akses', $data);
    }
}