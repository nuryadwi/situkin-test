<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif_model extends CI_Model {
	public $table ='t_alternatif';
	public $id = 'id_alternatif';
	public $order ='DESC';


	public function __construct()
    {
		parent::__construct();
		$this->load->database();
	}

    function get_pegawai_dapat_tunj()
    {
    	$query = $this->db->query("SELECT COUNT(ket_alternatif) AS dapat
									FROM t_alternatif
									WHERE ket_alternatif ='Mendapat Tunjangan'");
    	return $query->row();
    }
    function get_pegawai_blm_dinilai()
    {
    	$query = $this->db->query("SELECT COUNT(IF(hasil_alternatif>'0',0,NULL)) AS dinilai,
									COUNT(id_alternatif) AS total
								FROM t_alternatif");
    	return $query->row();
    }

    function get_nilai($idsess)
	{
		$this->db->select('*');
		$this->db->from('t_alternatif');
		$this->db->join('t_users', 't_alternatif.id_user=t_users.id_user');
		$this->db->where('t_alternatif.id_user', $idsess);
		$query = $this->db->get();
        return $query->row();
	}	

	public function getAlternatif()
	{
		$query = $this->db->query('SELECT*FROM t_alternatif');
		return $query->result();
	}
	
	public function isDuplicate($id_user)
	{
		$this->db->get_where('t_alternatif', array('id_user' => $id_user), 1);
        return $this->db->affected_rows() > 0 ? FALSE : TRUE;
	}

	function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
	}
	public function get_all($table){
		$this->db->from($table);
		return $this->db->get();
	}


	public function get_user() {
		$this->db->select('*');
		$this->db->from('tbl_alternatif');
		$this->db->join('t_users', 't_users.id_user=tbl_alternatif.id_user');
		$this->db->join('t_jabatan', 't_user.id_jabatan=t_jabatan.id_jabatan');

		$query = $this->db->get();
		return $query->result();
	   }

	function insert($data)
    {
        $this->db->insert($this->table, $data);
	}

	
	function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

	function destroy($id){
		$this->db->where('id_alternatif', $id);
		$this->db->delete('t_alternatif');
	}
	function destroy_ket($id){
		$this->db->where('id_alternatif', $id);
		$this->db->delete('t_alternatif');
	}
}
