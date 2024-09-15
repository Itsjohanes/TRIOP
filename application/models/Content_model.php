<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content_model extends CI_Model
{
    // Get all content data
    public function get_all_content()
    {
        return $this->db->get('tb_content')->result_array();
    }

    // Get content by ID
    public function get_content_by_id($id)
    {
        return $this->db->get_where('tb_content', ['id_content' => $id])->row_array();
    }

    // Insert new content
    public function insert_content($data)
    {
        return $this->db->insert('tb_content', $data);
    }

    // Delete content by ID
    public function delete_content($id)
    {
        $this->db->delete('tb_content', ['id_content' => $id]);
    }

    // Update content by ID
    public function update_content($id, $data)
    {
        $this->db->where('id_content', $id);
        $this->db->update('tb_content', $data);
    }
}
