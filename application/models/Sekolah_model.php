<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah_model extends CI_Model
{
    // Get all sekolah data
    public function get_all_sekolah()
    {
        return $this->db->get('tb_sekolah')->result_array();
    }

    // Get a specific sekolah by ID
    public function get_sekolah_by_id($id)
    {
        return $this->db->get_where('tb_sekolah', ['id_sekolah' => $id])->row_array();
    }

    // Insert a new sekolah record
    public function insert_sekolah($data)
    {
        return $this->db->insert('tb_sekolah', $data);
    }

    // Update an existing sekolah record
    public function update_sekolah($id, $data)
    {
        $this->db->where('id_sekolah', $id);
        return $this->db->update('tb_sekolah', $data);
    }

    // Delete a sekolah by ID
    public function delete_sekolah($id)
    {
        return $this->db->delete('tb_sekolah', ['id_sekolah' => $id]);
    }
}
