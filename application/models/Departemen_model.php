<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen_model extends CI_Model
{

    public $table = 't_departemen';
    public $id = 'id_departemen';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    public function get_all($table)
    {
		$this->db->from($table);
		return $this->db->get();
    }
    
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
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
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

}