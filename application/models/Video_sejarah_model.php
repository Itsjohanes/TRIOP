<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video_sejarah_model extends CI_Model
{
    // Get all videos
    public function get_all_video_sejarah()
    {
        return $this->db->get('tb_videosejarah')->result_array();
    }

    // Get a specific video by ID
    public function get_video_sejarah_by_id($id)
    {
        return $this->db->get_where('tb_videosejarah', ['id_videosejarah' => $id])->row_array();
    }

    // Insert new video data
    public function insert_video_sejarah($data)
    {
        return $this->db->insert('tb_videosejarah', $data);
    }

    // Delete a video by ID
    public function delete_video_sejarah($id)
    {
        return $this->db->delete('tb_videosejarah', ['id_videosejarah' => $id]);
    }

    // Update a video record
    public function update_video_sejarah($id, $data)
    {
        $this->db->where('id_videosejarah', $id);
        return $this->db->update('tb_videosejarah', $data);
    }
}
