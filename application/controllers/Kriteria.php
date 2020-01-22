<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

    function __construct()
    {
        parent::__construct();
            is_login();
            $this->load->library('form_validation');
            $this->load->model('kriteria_model');
    }

    public function index()
    {
    	$data = konfigurasi('Data Master','Kelola Data Kriteria');
        $data['krit'] = $this->kriteria_model->get_kriteria();
        $data['rerata'] = $this->kriteria_model->get_all('t_kriteria')->result();
        $data['jml1'] = $this->kriteria_model->get_sum1()->row();
        $data['jml2'] = $this->kriteria_model->get_sum2()->row();
    	$this->template->load('master','masterpenilaian/kriteria', $data);
    }

    function rules()
    {
    	$this->form_validation->set_rules('kriteria','Kode Kriteria', 'trim|required');
        $this->form_validation->set_rules('nama_kriteria','Nama Kriteria', 'trim|required');
        $this->form_validation->set_rules('deskripsi','Deskripsi', 'trim|required');
		$this->form_validation->set_rules('bobot1','Bobot Tabel 1', 'trim|required');
		$this->form_validation->set_rules('bobot2','Bobot Tabel 2', 'trim|required');
		$this->form_validation->set_message('required', '{field} wajib diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function simpan()
    {
    	$this->rules();
    	if ($this->form_validation->run() == FALSE) {
    		$this->session->set_flashdata('msg', 'error');
            redirect('kriteria');
    	}else{

  			$data1 = array(
  				'kriteria' => $this->input->post('kriteria'),
                'nama_kriteria' => $this->input->post('nama_kriteria'),
                'deskripsi' => $this->input->post('deskripsi'),
  			);
  			$data2 = array(
  				'bobot1' => $this->input->post('bobot1'),
  			);
  			$data3 = array(
  				'bobot2' => $this->input->post('bobot2'),
  			);
  		$this->kriteria_model->insert_data($data1,$data2,$data3);
  		$this->session->set_flashdata('msg', 'success');
  		redirect('kriteria');

    	}
    }

    function update()
    {
        $this->form_validation->set_rules('nama_kriteria','Nama Kriteria', 'trim|required');
        $this->form_validation->set_rules('deskripsi','Deskripsi', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg', 'error');
            redirect('kriteria');
        }else{
            $data = array(
                'id_kriteria' => $_POST['id_kriteria'],
                'nama_kriteria' => $_POST['nama_kriteria'],
                'deskripsi' => $_POST['deskripsi'],
            );
        $this->kriteria_model->update($this->input->post('id_kriteria', TRUE), $data);
        $this->session->set_flashdata('msg', 'success-update');  
        redirect(site_url('kriteria'));
        }
    }

    function norm1()
    {
    	$row1 = $this->kriteria_model->get_sum1()->row();
    	$bbt1 = $row1->bobot_norm_1;
    	$data1 = $this->kriteria_model->get_all('t_bobot1')->result();

    	foreach ($data1 as $b) 
    	{
			$id = $b->id_kriteria;
			$data[] = array(
				'id_kriteria' => $id,
	    		'norm1' => $b->bobot1/$bbt1,
				);
    	}
    	$this->db->set('norm1');
    	$this->db->update_batch('t_bobot1', $data,'id_kriteria');
    	
    	$this->session->set_flashdata('msg', 'success-normalisasi');
		redirect('kriteria');

    }

    function norm2()
    {
    	$row2 = $this->kriteria_model->get_sum2()->row();
    	$bbt2 = $row2->bobot_norm_2;
    	$data2 = $this->kriteria_model->get_all('t_bobot2')->result();

    	foreach ($data2 as $b) 
    	{
			$id = $b->id_kriteria;
			$data[] = array(
				'id_kriteria' => $id,
	    		'norm2' => $b->bobot2/$bbt2,
				);
    	}
    	//var_dump($bbt2);
    	$this->db->set('norm2');
    	$this->db->update_batch('t_bobot2', $data,'id_kriteria');
    	
    	$this->session->set_flashdata('msg', 'success-normalisasi');
		redirect('kriteria');

    }

    public function rerata()
    {
    	$row = $this->kriteria_model->get_kriteria();
    	
    	foreach ($row as $r) {
			$a = ($r->norm1+$r->norm2)/2;
			$data[] = array(
				'id_kriteria' => $r->id_kriteria,
				'bobot_rerata' => $a,
			);
    	}
    	$this->db->set('bobot_rerata');
    	$this->db->update_batch('t_kriteria', $data,'id_kriteria');
    	
    	$this->session->set_flashdata('msg', 'success-rerata');
		redirect('kriteria');
    }



    public function delete() 
    {
		$id = $_POST['id_kriteria'];
		$this->kriteria_model->destroy($id);
		$this->kriteria_model->destroy2($id);
		$this->kriteria_model->destroy3($id);
        $this->kriteria_model->destroy4($id);

		$this->session->set_flashdata('msg', 'success-hapus');
		redirect('kriteria');
    }

    function kosongkan_norm1()
    {
    	$this->kriteria_model->destroy_norm();
    	$this->kriteria_model->destroy_rata();
    	$this->session->set_flashdata('msg', 'success-kosongkan');
		redirect('kriteria');
    }
    function kosongkan_norm2()
    {
    	$this->kriteria_model->destroy_norm2();
    	$this->kriteria_model->destroy_rata();
    	$this->session->set_flashdata('msg', 'success-kosongkan');
		redirect('kriteria');
    }


}