<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public $table ='t_users';
	public $id = 'id_user';
	public $order ='DESC';
	

	
	public function isDuplicate($nip)
	{
		$this->db->get_where('t_users', array('nip' => $nip), 1);
        return $this->db->affected_rows() > 0 ? FALSE : TRUE;
	}

	public function updateLoginTime($id)
    {
        date_default_timezone_set('ASIA/JAKARTA');
        $this->db->where('id_user', $id);
        $this->db->update('t_users', array('last_login' => date('Y-m-d H:i:s')));
        return;
    }
    public function updateStatusOnline($id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('t_users', array('online' => 1 ));
        return;
    }
    public function updateStatusLogout($id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('t_users', array('online' => 0 ));
        return;
    }

    function get_user_aktif()
    {
    	$query = $this->db->query("SELECT CAST(SUM(STATUS)AS DECIMAL (12,0)) AS jml_aktif
									FROM t_users
									WHERE STATUS ='1' and id_role != '1'");
    	return $query->row();
    }

    function get_total_user()
    {

    	$query = $this->db->query("SELECT COUNT(id_user) AS jml_user
									FROM t_users");
    	return $query->row();
    }

    function get_user_online()
    {
    	$query = $this->db->query("SELECT CAST(SUM(online) AS DECIMAL (12,0)) AS jml_online
									FROM t_users");
    	return $query->row();
    }

    function get_jml_pegawai()
    {
    	$query = $this->db->query("SELECT COUNT(IF(id_role='2',2,NULL)) AS pegawai
						FROM t_users");
    	return $query->row();
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
	public function get_user()
	{
		$this->db->select('*');
		$this->db->from('t_users');
		$this->db->join('t_role','t_users.id_role=t_role.id_role','left');
		$this->db->join('t_jabatan','t_users.id_jabatan=t_jabatan.id_jabatan','left');
		$this->db->join('t_departemen','t_jabatan.id_departemen=t_departemen.id_departemen','left');
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_pegawai()
    {
		//join profil, users, bagian-jabatan,golongan
        $this->db->select('*');
        $this->db->from('t_users');
        $this->db->join('t_jabatan', 't_users.id_jabatan=t_jabatan.id_jabatan');
        //$this->db->join('t_golongan', 't_users.id_golongan=t_golongan.id_golongan');
       	$this->db->join('t_departemen','t_jabatan.id_departemen=t_departemen.id_departemen','left');
        return $this->db->get()->result();
	}

	public function get_user_by_id($idsess) {
		$this->db->select('*');
		$this->db->from('t_users');
		$this->db->join('t_role','t_users.id_role=t_role.id_role', 'left');
		$this->db->join('t_jabatan','t_users.id_jabatan=t_jabatan.id_jabatan','left');
		$this->db->join('t_departemen','t_jabatan.id_departemen=t_departemen.id_departemen', 'left');
		$this->db->where('t_users.id_user', $idsess);
		$query = $this->db->get();
		return $query->row();
	}

	 public function cari($nip)
	{
		$this->db->select('*');
		$this->db->from('t_users');
		$this->db->join('t_jabatan', 't_users.id_jabatan=t_jabatan.id_jabatan');
       	$this->db->join('t_departemen','t_jabatan.id_departemen=t_departemen.id_departemen','left');
       	$this->db->where('nip',$nip);
       	$query = $this->db->get();
		return $query;
	}
	public function getLevelById(){
		$query = $this->db->query('SELECT*FROM t_role');
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
	function update_status($table = null, $data=null, $where=null){
		$this->db->update($table, $data, $where);
	}

    public function reset_pass($data, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

	function get_where($table = null, $where = null){
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

	public function destroy($id)
	{
		return $this->db->delete($this->table, array('id_user' => $id));
	}

}
