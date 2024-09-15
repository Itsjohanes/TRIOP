<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_model extends CI_Model
{
    // Get all accounts
    public function get_all_akun()
    {
        return $this->db->get('tb_akun')->result_array();
    }

    // Get a single account by ID
    public function get_akun_by_id($id)
    {
        return $this->db->get_where('tb_akun', ['id_akun' => $id])->row_array();
    }

    // Check if email is already registered
    public function check_email_exists($email)
    {
        return $this->db->get_where('tb_akun', ['email' => $email])->num_rows();
    }

    // Insert a new account
    public function insert_akun($data)
    {
        return $this->db->insert('tb_akun', $data);
    }

    // Update an account by ID
    public function update_akun($id, $data)
    {
        $this->db->where('id_akun', $id);
        return $this->db->update('tb_akun', $data);
    }

    // Delete an account by ID
    public function delete_akun($id)
    {
        return $this->db->delete('tb_akun', ['id_akun' => $id]);
    }
}
