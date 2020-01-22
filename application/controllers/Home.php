<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
		parent::__construct();
        is_login();
        $this->load->model('tugas_model');
        $this->load->model('bukupegawai_model');
        $this->load->model('alternatif_model');
        $this->load->model('user_model');
        $this->load->model('kriteria_model');
		
	}
    public function index()
    {
        $idsess = $this->session->userdata('id_user');
        //admin
        if ($this->session->userdata('id_role')==='1') {
            $data = konfigurasi('Home','Administrator');
            $data['jml_aktif'] = $this->user_model->get_user_aktif();
            $data['jml_user'] = $this->user_model->get_total_user();
            $data['jml_online'] = $this->user_model->get_user_online();
            $data['pengguna'] = $this->user_model->get_user();
        //operator
        } elseif ($this->session->userdata('id_role')==='6') {
            $bln = date('m');
            $thn = date('Y');
            $awal = $thn.'-'.$bln.'-01';
            $akhir = $thn.'-'.$bln.'-31';
            $data = konfigurasi('Home','Operator');
            $data['recent'] = $this->tugas_model->get_recent();
            //$data['jml1'] = $this->user_model->get_jml_pegawai();
            $data['jml1'] = $this->alternatif_model->get_pegawai_dapat_tunj();
            $data['jml2'] = $this->alternatif_model->get_pegawai_blm_dinilai();
            $data['jml3'] = $this->tugas_model->getJmlTugas($awal, $akhir);
            $data['kriteria'] = $this->kriteria_model->get_all('t_kriteria')->result();
        
        //user
        }else{
            $bln = date('m');
            $thn = date('Y');
            $awal = $thn.'-'.$bln.'-01';
            $akhir = $thn.'-'.$bln.'-31';
            $where = ['tanggal >=' => $awal, 'tanggal <=' => $akhir, 't_tugas.id_user' => $idsess];
            $jml = $this->bukupegawai_model->getJmlTugas($where);
            $n = $this->alternatif_model->get_nilai($idsess);
            $data = konfigurasi('Home','Pengguna');
            $data['jml_tugas'] =  $jml->jumlah;
            $data['nilai'] = $n->hasil_alternatif;
            $data['ket'] = $n->ket_alternatif;
            $data['buku'] = $this->bukupegawai_model->getBukuPegawai($idsess);     
        }

        $this->template->load('master', '/dashboard/home', $data);
    }

     public function acc(){
        if(!is_numeric($this->uri->segment(3)) || !is_numeric($this->uri->segment(4)))
        {
            redirect('home');
        }
        $this->tugas_model->update_jml('t_tugas', ['jml' => $this->uri->segment(3)], ['id_tugas ' => $this->uri->segment(4)]);
        redirect('home');
    }

}