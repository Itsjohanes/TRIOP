<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    // Get all jadwal with school names
    public function get_all_jadwal()
    {
        $this->db->select('tb_jadwal.*, s1.nama as sekolah1, s2.nama as sekolah2');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_sekolah s1', 'tb_jadwal.id_sekolah1 = s1.id_sekolah', 'left');
        $this->db->join('tb_sekolah s2', 'tb_jadwal.id_sekolah2 = s2.id_sekolah', 'left');
        //order by tanggal asc
        $this->db->order_by('tanggal', 'asc');
        return $this->db->get()->result_array();
    }

    // Get jadwal by ID
    public function get_jadwal_by_id($id)
    {
        return $this->db->get_where('tb_jadwal', ['id_jadwal' => $id])->row_array();
    }

    // Insert new jadwal
    public function insert_jadwal($data)
    {
        return $this->db->insert('tb_jadwal', $data);
    }

    // Update jadwal by ID
    public function update_jadwal($id, $data)
    {
        $this->db->where('id_jadwal', $id);
        return $this->db->update('tb_jadwal', $data);
    }

    // Delete jadwal by ID
    public function delete_jadwal($id)
    {
        return $this->db->delete('tb_jadwal', ['id_jadwal' => $id]);
    }
}
