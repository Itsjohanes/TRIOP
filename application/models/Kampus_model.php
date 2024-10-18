<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kampus_model extends CI_Model
{
    // Get all kampus records
    public function get_all_kampuss()
    {
        return $this->db->get('tb_kampus')->result_array();
    }

    // Get a single kampus by ID
    public function get_kampus_by_id($id)
    {
        return $this->db->get_where('tb_kampus', ['id_kampus' => $id])->row_array();
    }

    // Insert a new kampus
    public function insert_kampus($data)
    {
        return $this->db->insert('tb_kampus', $data);
    }

    // Update a kampus by ID
    public function update_kampus($id, $data)
    {
        $this->db->where('id_kampus', $id);
        return $this->db->update('tb_kampus', $data);
    }

    // Delete a kampus by ID
    public function delete_kampus($id)
    {
        $kampus = $this->get_kampus_by_id($id);
        if (file_exists(FCPATH . 'assets/img/kampus/' . $kampus['gambar'])) {
            unlink(FCPATH . 'assets/img/kampus/' . $kampus['gambar']);
        }
        return $this->db->delete('tb_kampus', ['id_kampus' => $id]);
    }
}
