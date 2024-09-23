<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas_model extends CI_Model
{
    // Get all content data
    public function get_all_berkas()
    {
        return $this->db->get('tb_berkas')->result_array();
    }

    // Get content by ID
    public function get_berkas_by_id($id)
    {
        return $this->db->get_where('tb_berkas', ['id_berkas' => $id])->row_array();
    }

    // Insert new content
    public function insert_berkas($data)
    {
        return $this->db->insert('tb_berkas', $data);
    }

    // Delete content by ID
    public function delete_berkas($id)
    {
        $this->db->delete('tb_berkas', ['id_berkas' => $id]);
    }

    // Update content by ID
    public function update_berkas($id, $data)
    {
        $this->db->where('id_berkas', $id);
        $this->db->update('tb_berkas', $data);
    }
}
