<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video_model extends CI_Model
{
    // Get all videos
    public function get_all_videos()
    {
        return $this->db->get('tb_video')->result_array();
    }

    // Get a specific video by ID
    public function get_video_by_id($id)
    {
        return $this->db->get_where('tb_video', ['id_video' => $id])->row_array();
    }

    // Insert new video data
    public function insert_video($data)
    {
        return $this->db->insert('tb_video', $data);
    }

    // Delete a video by ID
    public function delete_video($id)
    {
        return $this->db->delete('tb_video', ['id_video' => $id]);
    }

    // Update a video record
    public function update_video($id, $data)
    {
        $this->db->where('id_video', $id);
        return $this->db->update('tb_video', $data);
    }
}
