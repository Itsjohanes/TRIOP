<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    // Get all berita
    public function get_all_berita()
    {
        return $this->db->get('tb_berita')->result_array();
    }

    // Get specific berita by ID
    public function get_berita_by_id($id)
    {
        return $this->db->get_where('tb_berita', ['id_berita' => $id])->row_array();
    }

    // Insert a new berita
    public function insert_berita($data)
    {
        return $this->db->insert('tb_berita', $data);
    }

    // Update an existing berita
    public function update_berita($id, $data)
    {
        $this->db->where('id_berita', $id);
        return $this->db->update('tb_berita', $data);
    }

    // Delete a berita by ID
    public function delete_berita($id)
    {
        return $this->db->delete('tb_berita', ['id_berita' => $id]);
    }
}
