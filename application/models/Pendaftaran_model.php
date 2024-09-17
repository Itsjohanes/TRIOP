<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{
    // Get all pendaftaran data
    public function get_all_pendaftaran()
    {
        return $this->db->get('tb_pendaftaran')->result_array();
    }

    public function delete_pendaftaran($id){
        $this->db->where('id_pendaftaran', $id);
        $this->db->delete('tb_pendaftaran');
    }
}
