<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_model extends CI_Model {

	public function __construct()
    {
		parent::__construct();
		$this->load->database();
	}

	

	function getJmlTugas($awal, $akhir)
	{
		
		$query = $this->db->query("SELECT COUNT(IF(jml ='0',0,NULL)) AS tugas1,
									COUNT(jml) AS tugas2
								from t_tugas
								where create_at >='".$awal."' and create_at <='".$akhir."' ");
    	return $query->row();
		
	}

	function report($where= '')
	{
		$this->db->select('*');
		$this->db->from('t_tugas');
		$this->db->join('t_users', 't_tugas.id_user=t_users.id_user');
		$this->db->join('t_jabatan', 't_users.id_jabatan=t_jabatan.id_jabatan');
		$this->db->join('t_departemen', 't_jabatan.id_departemen=t_departemen.id_departemen','left');
		$this->db->where($where);
		$this->db->order_by('t_tugas.id_user');
		$this->db->order_by('t_tugas.tanggal','DESC');

		return $this->db->get()->result();
	}

	function get_recent()
	{
		$query =$this->db->query("SELECT *
							FROM t_tugas
							JOIN t_users ON t_tugas.`id_user`=t_users.`id_user`
							WHERE jml='0'
							ORDER BY CONCAT(create_at) DESC");
		return $query->result();
	}

	function update_jml($table = null, $data=null, $where=null){
		$this->db->update($table, $data, $where);
	}

	function download($id)
	{
		$query = $this->db->get_where('t_tugas',array('id_tugas'=>$id));
  		return $query->row_array();
	}

	function destroy($id)
	{
		$this->db->where('id_tugas', $id);
		$this->db->delete('t_tugas');
	}
	
	function insert($data)
    {
        $this->db->insert('t_tugas', $data);
    }
	
	function insert_tugas($data)
    {
        $this->db->insert('t_skp', $data);
    }
	
	function getTugasPegawai($idsess,$bln)
	{
		$this->db->select('*');
		$this->db->from('t_skp');
		$this->db->where('id_user', $idsess);
		$this->db->where('create_at',$bln);
		
		return $this->db->get()->result();
	}
	public function cari($id_skp)
	{
		$this->db->select('*');
		$this->db->from('t_skp');
		
       	$this->db->where('id_skp',$id_skp);
       	$query = $this->db->get();
		return $query;
	}

}