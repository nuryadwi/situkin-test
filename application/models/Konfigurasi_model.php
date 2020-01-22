<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
    {
		parent::__construct();
		$this->load->database();
	}

	#Listing Konfigurasi
    public function listing() {
        $this->db->select('*');
        $this->db->from('t_konfigurasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_konfig()
    {
        $this->db->select('*');
        $this->db->from('t_konfigurasi');
        $query = $this->db->get();
        return $query->result();
    }

    function update($id, $data)
    {
        $this->db->where('id_konfigurasi', $id);
        $this->db->update('t_konfigurasi', $data);
    }

}