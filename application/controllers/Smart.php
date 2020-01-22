<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smart extends CI_Controller {

    function __construct()
    {
        parent::__construct();
            is_login();
            $this->load->library('form_validation');
            $this->load->model('smart_model');
            $this->load->model('kriteria_model');
            $this->load->model('user_model');
            $this->load->model('alternatif_model');
    }

    function index()
    {
    	
        $data = konfigurasi('Penilaian','Daftar Nilai');
        $data['kriteria'] = $this->kriteria_model->get_all('t_kriteria')->result();
        $data['alternatif'] =  $this->smart_model->get_alter();
        $data['pegawai'] =  $this->user_model->get_pegawai();
        $data['pegawai_selected'] =  set_value('id_user');
        $data['kritparam']  = $this->kriteria_model->get_kriteria_param(); 
    	$this->template->load('master','penilaian/smart_list', $data);
    }

    function rules()
    {
        $this->form_validation->set_rules('id_user','id_user', 'trim|required');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function tambah()
    {   
        $this->rules();
        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg', 'error');
            redirect(site_url('smart'));
        } else{
            if(! $this->alternatif_model->isDuplicate($_POST['id_user'])){
                $this->session->set_flashdata('msg', 'warning-pegawai');
                redirect(base_url('smart'));
         }
         else{
            $data = array(
                'id_user' => $_POST['id_user'],
                );
            $this->alternatif_model->insert($data);
            $this->session->set_flashdata('msg', 'success');
            redirect(site_url('smart'));
            }
        }
    }

    public function cari()
    {
        $nip=$_GET['nip'];
        $cari =$this->user_model->cari($nip)->result();
        echo json_encode($cari);
    } 

    function simpan()
    {
    	//id_altrtnatif
    	$alt = $_POST['alt'];
    	$stmtx1 = $this->kriteria_model->get_all('t_kriteria')->result();
    	foreach ($stmtx1 as $rowx1) {
    		if ($rowx1->id_kriteria == true) {
    			//id_kriteria
    			$idkri = $rowx1->id_kriteria;
    		      //array kriteria
    			$kri = $_POST['kri'][$idkri];
    			//get c_max
    			$param = $this->smart_model->get_param($kri);
    			$c_max = $param->maks;
    			$c_min = $param->min;
    			//c_out
    			$altkri = $_POST['altkri'][$idkri];
    		}
    		$c_out = $altkri;
    		$ida = $alt;

    		if ($param->type == '2') { //cost
    			$utl = (($c_max-$c_out)/($c_max-$c_min)*100);
    		}else{
    			$utl = (($c_out-$c_min)/($c_max-$c_min)*100);
    		}
            $hsl = $utl*$rowx1->bobot_rerata;	

    		$data[] = array(
    			'id_alternatif' => $alt,
    			'id_kriteria'  => $kri,
    			'nilai_alternatif_kriteria' => $utl,
                'bobot_alternatif_kriteria' => $hsl,
    		);
            //data nilai awal
            $data2[] = array(
                'id_alternatif' =>$alt,
                'id_kriteria' => $kri,
                'nilai_awal' => $c_out,
            );
    	}
    	$this->smart_model->insert($data);
        
        $this->smart_model->insert2($data2);
        $this->session->set_flashdata('msg', 'success');  
        redirect(site_url('smart'));
    }
    
    public function delete() 
    {
        $id = $_POST['id_alternatif'];
        $this->smart_model->destroy($id);
        $this->smart_model->destroy2($id);
		$this->smart_model->destroy3($id);
        $this->session->set_flashdata('msg', 'success-hapus');      
        redirect('smart');
    } 

    public function hapus_alternatif() 
    {
        $id = $_POST['id_alternatif'];
        $this->alternatif_model->destroy($id);
        $this->session->set_flashdata('msg', 'success-hapus');
        redirect('smart');
    }
}