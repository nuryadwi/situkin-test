<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('user_model');

    }

	public function index()
	{   
        if($this->session->userdata('id_user')){
            redirect(site_url('home'));
        }
        else{
            $data['header'] = "Login";
            $this->load->view('auth/login_form', $data);
        }  
    }

    public function rules() 
    {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    $this->form_validation->set_message('required', '{field} wajib diisi');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }
 
    public function ceklogin(){
        $this->rules();
        $username    = $this->input->post('username');
     
        $password    = $this->input->post('password',TRUE);
    
        if ($this->form_validation->run() == FALSE) {
        $this->index();
        
        } else {
            
            $hashPass = password_hash($password,PASSWORD_DEFAULT);
            $test     = password_verify($password, $hashPass);
            // query chek users
            $this->db->where("username = '$username' && status =1");
            
            $this->db->join('t_role', 't_users.id_role=t_role.id_role');
            $users = $this->db->get('t_users');

            if($users->num_rows()>0){
                 $user = $users->row_array();
             if(password_verify($password,$user['password'])){
            // retrive user data to session
             $this->user_model->updateLoginTime($user['id_user']);
             $this->user_model->updateStatusOnline($user['id_user']);
             $this->session->set_userdata($user);
            //notif masuk
             $this->session->set_flashdata('msg', 'success-login');
             redirect('home');
            }else{
            $this->session->set_flashdata('msg', 'error');
            redirect(base_url());
                }
            }else{
             $this->session->set_flashdata('msg', 'warning');
             redirect(base_url());
            }
        }  
    }

    function logout(){
        $id = $this->session->userdata('id_user');
        $this->user_model->updateStatusLogout($id);
        $this->session->sess_destroy();
        $this->session->set_flashdata('msg','success-logout');
        redirect(base_url());
    }

    
}
