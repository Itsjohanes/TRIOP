<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video_testimoni_model extends CI_Model
{
    // Get all videos
    public function get_all_video_testimoni()
    {
        return $this->db->get('tb_videotestimoni')->result_array();
    }

    // Get a specific video by ID
    public function get_video_testimoni_by_id($id)
    {
        return $this->db->get_where('tb_videotestimoni', ['id_videotestimoni' => $id])->row_array();
    }

    // Insert new video data
    public function insert_video_testimoni($data)
    {
        return $this->db->insert('tb_videotestimoni', $data);
    }

    // Delete a video by ID
    public function delete_video_testimoni($id)
    {
        return $this->db->delete('tb_videotestimoni', ['id_videotestimoni' => $id]);
    }

    // Update a video record
    public function update_video_testimoni($id, $data)
    {
        $this->db->where('id_videotestimoni', $id);
        return $this->db->update('tb_videotestimoni', $data);
    }
}
