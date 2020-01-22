<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlevel extends CI_Controller {

    function __construct()
    {
        parent::__construct();
            is_login();
            $this->load->library('form_validation');
            $this->load->model('user_level_model');
	}

	public function index()
	{   
        $data = konfigurasi('Level User', 'Kelola Level User');
        $data['role'] =  $this->user_level_model->get_all('t_role')->result();
        $data['level'] = $this->db->get_where('t_role',array('id_role'=>  $this->uri->segment(3)))->row_array();
        $data['menu'] = $this->db->get('t_menu')->result();
        $this->template->load('master', 'setting/penggunalevel', $data);
    }
    public function rules()
    {
        $this->form_validation->set_rules('nama_role', 'Nama level','trim|required');
        $this->form_validation->set_rules('id_role', 'id_role', 'trim');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function kasi_akses_ajax(){
        $id_menu        = $_GET['id_menu'];
        $id_role  = $_GET['level'];
        // chek data
        $params = array('id_menu'=>$id_menu,'id_role'=>$id_role);
        $akses = $this->db->get_where('t_hak_akses',$params);
        if($akses->num_rows()<1){
            // insert data baru
            $this->db->insert('t_hak_akses',$params);
        }else{
            $this->db->where('id_menu',$id_menu);
            $this->db->where('id_role',$id_role);
            $this->db->delete('t_hak_akses');
        }
    }

    public function simpan(){
        $this->rules();
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg', 'warning');
            redirect(site_url('userlevel'));
        }else{
            $data = array(
                'nama_role' => $this->input->post('nama_role', TRUE),
            );
            $this->user_level_model->insert($data);
            $this->session->set_flashdata('msg', 'success');
            redirect(site_url('userlevel'));
        }
    }

    public function update(){
        $this->rules();
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg', 'warning');
            redirect(site_url('userlevel'));
        }else{
            $data = array(
                'id_role'   => $this->input->post('id_role',TRUE),
                'nama_role' => $this->input->post('nama_role',TRUE),
            );
            
            $this->user_level_model->update($_POST['id_role'], $data);
            $this->session->set_flashdata('msg', 'success-update');  
            redirect(site_url('userlevel'));
        }
    }
    public function delete() 
    {
		$id = $_POST['id_role'];
		$this->user_level_model->destroy($id);
        $this->user_level_model->destroy_hakakses($id);
        $this->session->set_flashdata('msg', 'success-hapus');
		redirect('userlevel');
    }
}
