<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukupegawai_model extends CI_Model {


	public function __construct()
    {
		parent::__construct();
		$this->load->database();
	}

	function insert($data)
    {
        $this->db->insert('t_tugas', $data);
    }
	
	function getTugasHarian($tanggal)
	{
		$this->db->select('*');
		$this->db->from('t_tugas');
		$this->db->join('t_users','t_tugas.id_user=t_users.id_user');
		$this->db->join('t_kriteria','t_tugas.id_kriteria=t_kriteria.id_kriteria');
		$this->db->where('tanggal',$tanggal);
		$this->db->order_by('t_tugas.tanggal','DESC');
		
		return $this->db->get()->result();
		
	}
	
	function getTugasBulanan($where)
	{
		$this->db->select('*');
		$this->db->from('t_tugas');
		$this->db->join('t_users','t_tugas.id_user=t_users.id_user');
		$this->db->where($where);
		$this->db->order_by('t_tugas.tanggal','DESC');
		
		return $this->db->get()->result();
		
	}

    function getBukuPegawai($idsess)
    {
    	$this->db->select('*');
    	$this->db->from('t_tugas');
    	$this->db->join('t_users', 't_tugas.id_user=t_users.id_user');
    	$this->db->join('t_jabatan', 't_users.id_jabatan=t_jabatan.id_jabatan');
        $this->db->join('t_departemen', 't_jabatan.id_departemen=t_departemen.id_departemen','left');
    	$this->db->where('t_tugas.id_user', $idsess);
        $this->db->order_by('t_tugas.tanggal', 'DESC');
    	$query = $this->db->get();
    	return $query->result();
    }

    function getJmlTugas($where)
    {
       $this->db->select_sum('jml','jumlah');
       $this->db->from('t_tugas');
       $this->db->join('t_users','t_tugas.id_user=t_users.id_user');
       $this->db->where($where);
       return $this->db->get()->row();
    }

    function getJmlTugasPegawai($awal, $akhir, $idsess)
    {
        
        $query = $this->db->query("SELECT COUNT(IF(jml ='1',1,NULL)) AS tugas1,
                                    COUNT(IF(jml ='0',0,NULL)) AS tugas2
                                FROM t_tugas
                                JOIN t_users ON t_tugas.id_user=t_users.id_user
                                WHERE tanggal >='".$awal."' AND tanggal <='".$akhir."' AND t_tugas.id_user = '".$idsess."' ");
        return $query->row();
        
    }

    function get_ket($idsess)
    {
        $this->db->select('*');
        $this->db->from('t_alternatif');
        $this->db->where('id_user', $idsess);
        return $this->db->get()->row();
    }
}