<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{
    // Get all pendaftaran data
    public function get_all_pendaftaran()
    {
        return $this->db->get('tb_pendaftaran')->result_array();
    }
<<<<<<< HEAD
    //get_pendaftaran_by_id
    public function get_pendaftaran_by_id($id)
    {
        return $this->db->get_where('tb_pendaftaran', ['id_pendaftaran' => $id])->row_array();
    }
=======
    //get pendaftaran by id
    public function get_pendaftaran_by_id($id)
    {
        $this->db->where('id_pendaftaran', $id);
        return $this->db->get('tb_pendaftaran')->row_array();
    }

>>>>>>> 9c0efecc484e3bf88c567b51a5ad2d326420693d

    public function delete_pendaftaran($id){
        $this->db->where('id_pendaftaran', $id);
        $this->db->delete('tb_pendaftaran');
    }
}
