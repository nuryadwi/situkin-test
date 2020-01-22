<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smart_model extends CI_Model {

	public function __construct()
    {
		parent::__construct();
		$this->load->database();
	}

	function get_alter()
	{
		$this->db->select('*');
		$this->db->from('t_alternatif');
		$this->db->join('t_users','t_alternatif.id_user=t_users.id_user');
		$this->db->join('t_jabatan','t_users.id_jabatan=t_jabatan.id_jabatan');
		$this->db->join('t_departemen','t_jabatan.id_departemen=t_departemen.id_departemen','left');
		$query = $this->db->get();
		return $query->result();
	}

	function get_param($pram)
	{
		$this->db->select('*');
		$this->db->from('t_parameter');
		$this->db->where('id_kriteria', $pram);
		$query = $this->db->get();
		return $query->row();
	}

	function get_nilai($id)
	{
		$this->db->select('*');
	    $this->db->from('t_alternatif');
	    $this->db->join('t_alternatif_kriteria', 't_alternatif.id_alternatif=t_alternatif_kriteria.id_alternatif');
	    $this->db->join('t_kriteria', 't_alternatif_kriteria.id_kriteria=t_kriteria.id_kriteria');
	    $this->db->join('t_nilai_awal', 't_kriteria.id_kriteria=t_nilai_awal.id_kriteria');
	    $this->db->where('t_alternatif.id_user', $id);
	    $this->db->group_by('t_alternatif_kriteria.id_kriteria');
	    $query = $this->db->get();
        return $query->result();
	}

	function insert($data)
    {
        $this->db->insert_batch('t_alternatif_kriteria',$data);
	}
	function insert2($data2)
    {
        $this->db->insert_batch('t_nilai_awal',$data2);
	}

	function destroy($id)
	{
		$this->db->where('id_alternatif', $id);
		$this->db->delete('t_alternatif_kriteria');
	}
	function destroy2($id)
	{
		$this->db->where('id_alternatif', $id);
		$this->db->delete('t_nilai_awal');
	}
	
	function destroy3($id)
	{
		$data = array(
			'hasil_alternatif' => "(NULL)",
			'ket_alternatif'   => "Tidak Mendapat Tunjangan",
		);
		$this->db->where('id_alternatif', $id);
        $this->db->update('t_alternatif', $data);
	}

}