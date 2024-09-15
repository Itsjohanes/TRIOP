<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sponsor_model extends CI_Model
{
    // Get all sponsor records
    public function get_all_sponsors()
    {
        return $this->db->get('tb_sponsor')->result_array();
    }

    // Get a single sponsor by ID
    public function get_sponsor_by_id($id)
    {
        return $this->db->get_where('tb_sponsor', ['id_sponsor' => $id])->row_array();
    }

    // Insert a new sponsor
    public function insert_sponsor($data)
    {
        return $this->db->insert('tb_sponsor', $data);
    }

    // Update a sponsor by ID
    public function update_sponsor($id, $data)
    {
        $this->db->where('id_sponsor', $id);
        return $this->db->update('tb_sponsor', $data);
    }

    // Delete a sponsor by ID
    public function delete_sponsor($id)
    {
        $sponsor = $this->get_sponsor_by_id($id);
        if (file_exists(FCPATH . 'assets/img/sponsor/' . $sponsor['gambar'])) {
            unlink(FCPATH . 'assets/img/sponsor/' . $sponsor['gambar']);
        }
        return $this->db->delete('tb_sponsor', ['id_sponsor' => $id]);
    }
}
