<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Media_model extends CI_Model
{
    // Get all media records
    public function get_all_medias()
    {
        return $this->db->get('tb_media')->result_array();
    }

    // Get a single media by ID
    public function get_media_by_id($id)
    {
        return $this->db->get_where('tb_media', ['id_media' => $id])->row_array();
    }

    // Insert a new media
    public function insert_media($data)
    {
        return $this->db->insert('tb_media', $data);
    }

    // Update a media by ID
    public function update_media($id, $data)
    {
        $this->db->where('id_media', $id);
        return $this->db->update('tb_media', $data);
    }

    // Delete a media by ID
    public function delete_media($id)
    {
        $media = $this->get_media_by_id($id);
        if (file_exists(FCPATH . 'assets/img/media/' . $media['gambar'])) {
            unlink(FCPATH . 'assets/img/media/' . $media['gambar']);
        }
        return $this->db->delete('tb_media', ['id_media' => $id]);
    }
}
