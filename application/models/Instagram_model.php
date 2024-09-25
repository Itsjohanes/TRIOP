<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instagram_model extends CI_Model
{
    // Get all instagram
    public function get_all_instagram()
    {
        return $this->db->get('tb_instagram')->result_array();
    }

    // Get a specific instagram by ID
    public function get_instagram_by_id($id)
    {
        return $this->db->get_where('tb_instagram', ['id_instagram' => $id])->row_array();
    }

    // Insert new instagram data
    public function insert_instagram($data)
    {
        return $this->db->insert('tb_instagram', $data);
    }

    // Delete a instagram by ID
    public function delete_instagram($id)
    {
        return $this->db->delete('tb_instagram', ['id_instagram' => $id]);
    }

    // Update a instagram record
    public function update_instagram($id, $data)
    {
        $this->db->where('id_instagram', $id);
        return $this->db->update('tb_instagram', $data);
    }
}
