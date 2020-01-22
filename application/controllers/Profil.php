<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
        $this->load->model('user_model');
		
	}

    public function index()
    {
        $data = konfigurasi('Setting', 'Profil');
        $id = $this->session->userdata('id_user');
        $get=  $this->user_model->get_user_by_id($id);
        $jab = $get->nama_jabatan." ".$get->nama_departemen;
        $data['jabatan'] = $jab;
        $data['status'] = rename_string_status($get->status);
        $data['create_on'] = $get->create_on;
        $data['last_login'] = $get->last_login;
        $data['id_user'] = set_value('id_user', $get->id_user);
        $data['nip'] = set_value('nip', $get->nip);
        $data['nik'] = set_value('nik', $get->nik);
        $data['nama'] = set_value('nama', $get->full_name);
        $data['tgl_lahir'] = set_value('tgl_lahir', $get->tgl_lahir);
        $data['email'] = set_value('email', $get->email);
        $data['phone'] = set_value('phone', $get->phone);
        $data['gender'] = set_value('gender', $get->gender);
        $data['images'] = set_value('images', $get->images);
        $data['alamat'] = set_value('alamat', $get->alamat);
        $data['username'] = set_value('username', $get->username);
        
        $this->template->load('master', 'setting/profil', $data);
    }

    function simpan()
    {
        $this->rules();
        $foto = $this->upload_foto();
        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg','error');
            redirect(site_url('profil'));
        }else{
            if(!empty($_FILES["images"]["name"])){
                $data = array(
                'id_user'       => $this->input->post('id_user', TRUE),
                'nip'           => $this->input->post('nip', TRUE),
                'nik'           => $this->input->post('nik', TRUE),
                'full_name'     => $this->input->post('nama', TRUE),
                //'id_golongan'   => $this->input->post('id_golongan', TRUE),
                'tgl_lahir'     => $this->input->post('tgl_lahir', TRUE),
                'email'         => $this->input->post('email', TRUE) ,
                'phone'         => $this->input->post('phone', TRUE),
                'gender'        => $this->input->post('gender', TRUE),
                'alamat'        => $this->input->post('alamat', TRUE),
                'images'        => $foto['file_name'],
            );
            }else{
                $data = array(
                'id_user'       => $this->input->post('id_user', TRUE),
                'nip'           => $this->input->post('nip', TRUE),
                'nik'           => $this->input->post('nik', TRUE),
                'full_name'     => $this->input->post('nama', TRUE),
                //'id_golongan'   => $this->input->post('id_golongan', TRUE),
                'tgl_lahir'     => $this->input->post('tgl_lahir', TRUE),
                'email'         => $this->input->post('email', TRUE) ,
                'phone'         => $this->input->post('phone', TRUE),
                'gender'        => $this->input->post('gender', TRUE),
                'alamat'        => $this->input->post('alamat', TRUE),
                'images'     => $_POST["old_images"],
            );  

            }
            //print_r($data);
            $this->user_model->update($this->session->userdata('id_user'),$data);
            $this->session->set_flashdata('msg', 'success-update');
            redirect(site_url('profil'));
        } 
    }


    /*-- form_validation rules --*/
    public function rules()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    /*-- Upload image config --*/
    private function upload_foto(){
        $config['upload_path']          = './assets/foto_profil';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'foto-profil-'.$_POST['id_user'].'-'.$_POST['nip'];
        $config['overwrite']            = 'true';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('images')) {
            $gbr = $this->upload->data();
            //compress
            $config['image_library'] ='gd2';
            $config['source_image'] = './assets/foto_profil/'.$gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '50%';
            $config['width'] = '250';
            $config['height'] = '250';
            $config['new_image'] = './assets/foto_profil/'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            return $gbr;

        }

        return "user.png";
        
    }

 /* Ganti Password */
    public function ganti_password()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        
        if($this->form_validation->run()== FALSE) {
            $this->session->set_flashdata('msg','error');
            redirect(site_url('profil'));
        }else{
            $id = $this->session->userdata('id_user');
            $password = $this->input->post('password', TRUE);
            $options = array("cost" => 4);
            $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
            
            if (!empty($this->input->post('password'))) {
                $data = array(
                'username' => $this->input->post('username'),
                'password' => $hashPassword,
            );
            }else{
                $data = array(
                'username' => $this->input->post('username'), 
                );
            }
            $this->user_model->reset_pass($data, $id);
            $this->session->set_flashdata('msg', 'success-ganti-password');
            redirect(site_url('profil'));
			
        }
    }

    
}
