<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Admin
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Johannes Alexander Putra <johannesap@upi.edu>
 * @link      https://github.com/Itsjohanes
 * @param     ...
 * @return    ...
 *
 */

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Cetak_pdf');
  }

  public function index()
  {
    $data['title'] = "Dashboard";

    $data['jumlahAdmin'] = $this->db->get_where('tb_akun', ['aktif' => 1])->num_rows();
    //mendapatkan siswa yang terlambat 
    
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/dashboard');
      $this->load->view('admin/footer');
    }
  }
  public function video(){
    $data['title'] = "Video Youtube";
    //ambil data dari tb_youtube
    $data['video'] = $this->db->get('tb_video')->result_array();
    
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/video');
      $this->load->view('admin/footer');
    }
  }
  public function tambah_video(){
    $data['title'] = "Tambah Video";
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/tambah_video');
      $this->load->view('admin/footer');
    }
  }
  public function submit_video(){
    $judul = $this->input->post('judul');
    $link = $this->input->post('link');
    $data = [
      'judul' => $judul,
      'link' => $link
    ];
    $this->db->insert('tb_video', $data);
    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
    redirect('admin/video');
  }

  public function hapus_video($id){
    //pastikan sudah login
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->db->delete('tb_video', ['id_youtube' => $id]);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/video');
    }
    
  }
  public function edit_video($id){
    $data['title'] = "Edit Video";
    $data['video'] = $this->db->get_where('tb_video', ['id_youtube' => $id])->row_array();
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/edit_video');
      $this->load->view('admin/footer');
    }
  }
  public function update_video(){
    $id = $this->input->post('id');
    $judul = $this->input->post('judul');
    $link = $this->input->post('link');
    $data = [
      'judul' => $judul,
      'link' => $link
    ];
    $this->db->where('id_youtube', $id);
    $this->db->update('tb_video', $data);
    $this->session->set_flashdata('success', 'Data berhasil diupdate');
    redirect('admin/video');
  }
 
  
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */