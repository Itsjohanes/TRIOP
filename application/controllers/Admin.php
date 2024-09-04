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

    public function berita(){
    $data['title'] = "Berita Seputar TRIOP";
    //ambil data dari tb_youtube
    $data['video'] = $this->db->get('tb_berita')->result_array();
    
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/berita');
      $this->load->view('admin/footer');
    }
  }
  public function tambah_berita(){
    $data['title'] = "Tambah Berita";
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
    
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/tambah_berita');
      $this->load->view('admin/footer');
    }
  }
  public function submit_berita(){
    $judul = $this->input->post('judul');
    $isi = $this->input->post('isi');
    //Foto Berita
    $config['upload_path']          = './assets/img/berita/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 10000;
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar')) {
      $gambar = $this->upload->data('file_name');
    } else {
      $this->session->set_flashdata('error', $this->upload->display_errors());
      redirect('admin/tambah_berita');
    }

    $data = [
      'judul' => $judul,
      'isi' => $isi,
      'gambar' => $gambar
    ];
    $this->db->insert('tb_berita', $data);
    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
    redirect('admin/berita');
  }

  public function hapus_berita($id){
    //pastikan sudah login
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      //querykan untuk mencari gambar berita dan unlink
      $gambar = $this->db->get_where('tb_berita', ['id_berita' => $id])->row_array();
      unlink(FCPATH . 'assets/img/berita/' . $gambar['gambar']);
      $this->db->delete('tb_berita', ['id_berita' => $id]);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/berita');
    }
    
  }
  public function edit_berita($id){
    $data['title'] = "Edit Berita";
    $data['berita'] = $this->db->get_where('tb_berita', ['id_berita' => $id])->row_array();
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/edit_berita');
      $this->load->view('admin/footer');
    }
  }
  public function update_berita(){

      $id = $this->input->post('id');
      $judul = $this->input->post('judul');
      $isi = $this->input->post('isi');
      //upload dan ganti gambar sebelum
      $config['upload_path']          = './assets/img/berita/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 10000;
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gambar')) {
        $gambar = $this->upload->data('file_name');
        //unlink dulu gambar yang lama
        $gambar_lama = $this->db->get_where('tb_berita', ['id_berita' => $id])->row_array();
        unlink(FCPATH . 'assets/img/berita/' . $gambar_lama['gambar']);
        $data = [
          'judul' => $judul,
          'isi' => $isi,
          'gambar' => $gambar
        ];
        var_dump($data);
     

        $this->db->where('id_berita', $id);
        $this->db->update('tb_berita', $data);
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin/berita');
       
      } else {
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect('admin/berita/' . $id);
      }
    
  }
 
  
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */