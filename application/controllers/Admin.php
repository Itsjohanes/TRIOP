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
    $data['title'] = "Video Pertandingan";
    //ambil data dari tb_youtube desc
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
    public function submit_berita() {
      $judul = $this->input->post('judul');
      $isi = $this->input->post('isi');

      // Configuration for file upload
      $config['upload_path']          = './assets/img/berita/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 10000;
      $config['encrypt_name']         = TRUE; // Encrypt the file name to make it unique

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
          $gambar = $this->upload->data('file_name');
      } else {
          $this->session->set_flashdata('error', $this->upload->display_errors());
          redirect('admin/tambah_berita');
      }

      $data = [
          'judul' => $judul,
          'isi'   => $isi,
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
  public function update_berita() {
      $id = $this->input->post('id');
      $judul = $this->input->post('judul');
      $isi = $this->input->post('isi');

      // Configuration for file upload
      $config['upload_path']          = './assets/img/berita/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 10000;
      $config['encrypt_name']         = TRUE; // Encrypt the file name to make it unique

      $this->load->library('upload', $config);

      // Get current berita data to check for existing gambar
      $gambar_lama = $this->db->get_where('tb_berita', ['id_berita' => $id])->row_array();
      
      if ($_FILES['gambar']['name']) { // Check if a new file is uploaded
          if ($this->upload->do_upload('gambar')) {
              $gambar = $this->upload->data('file_name');
              
              // Delete the old image file if it exists
              if (file_exists(FCPATH . 'assets/img/berita/' . $gambar_lama['gambar'])) {
                  unlink(FCPATH . 'assets/img/berita/' . $gambar_lama['gambar']);
              }

              // Prepare data with new gambar
              $data = [
                  'judul' => $judul,
                  'isi' => $isi,
                  'gambar' => $gambar
              ];
          } else {
              $this->session->set_flashdata('error', $this->upload->display_errors());
              redirect('admin/berita/' . $id);
              return;
          }
      } else {
          // If no new file is uploaded, keep the old gambar
          $data = [
              'judul' => $judul,
              'isi' => $isi,
              'gambar' => $gambar_lama['gambar']
          ];
      }

      // Update the berita record
      $this->db->where('id_berita', $id);
      $this->db->update('tb_berita', $data);
      $this->session->set_flashdata('success', 'Data berhasil diupdate');
      redirect('admin/berita');
  }


  public function sekolah(){
    $data['title'] = "Sekolah";
    //ambil data dari tb_youtube
    $data['sekolah'] = $this->db->get('tb_sekolah')->result_array();
    
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/sekolah');
      $this->load->view('admin/footer');
    }
  }
  public function tambah_sekolah(){
    $data['title'] = "Tambah Sekolah";
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
    
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/tambah_sekolah');
      $this->load->view('admin/footer');
    }
  }
    public function submit_sekolah() {
      $nama = $this->input->post('nama');

      // Configuration for file upload
      $config['upload_path']          = './assets/img/sekolah/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 10000;
      $config['encrypt_name']         = TRUE; // Encrypt the file name to make it unique

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
          $gambar = $this->upload->data('file_name');
      } else {
          $this->session->set_flashdata('error', $this->upload->display_errors());
          redirect('admin/tambah_sekolah');
      }

      $data = [
          'nama' => $nama,
          'gambar' => $gambar
      ];

      $this->db->insert('tb_sekolah', $data);
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect('admin/sekolah');
  }


  public function hapus_sekolah($id){
    //pastikan sudah login
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      //querykan untuk mencari gambar berita dan unlink
      $gambar = $this->db->get_where('tb_sekolah', ['id_sekolah' => $id])->row_array();
      unlink(FCPATH . 'assets/img/sekolah/' . $gambar['gambar']);
      $this->db->delete('tb_sekolah', ['id_sekolah' => $id]);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/sekolah');
    }
    
  }
  public function edit_sekolah($id){
    $data['title'] = "Edit Berita";
    $data['sekolah'] = $this->db->get_where('tb_sekolah', ['id_sekolah' => $id])->row_array();
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/edit_sekolah');
      $this->load->view('admin/footer');
    }
  }
  public function update_sekolah() {
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');

      // Configuration for file upload
      $config['upload_path']          = './assets/img/sekolah/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 10000;
      $config['encrypt_name']         = TRUE; // Encrypt the file name to make it unique

      $this->load->library('upload', $config);

      // Get current berita data to check for existing gambar
      $gambar_lama = $this->db->get_where('tb_sekolah', ['id_sekolah' => $id])->row_array();
      
      if ($_FILES['gambar']['name']) { // Check if a new file is uploaded
          if ($this->upload->do_upload('gambar')) {
              $gambar = $this->upload->data('file_name');
              
              // Delete the old image file if it exists
              if (file_exists(FCPATH . 'assets/img/sekolah/' . $gambar_lama['gambar'])) {
                  unlink(FCPATH . 'assets/img/sekolah/' . $gambar_lama['gambar']);
              }

              // Prepare data with new gambar
              $data = [
                  'nama' => $nama,
                  'gambar' => $gambar,
              ];
          } else {
              $this->session->set_flashdata('error', $this->upload->display_errors());
              redirect('admin/sekolah/' . $id);
              return;
          }
      } else {
          // If no new file is uploaded, keep the old gambar
          $data = [
              'nama' => $nama,
              'gambar' => $gambar_lama['gambar']
          ];
      }

      // Update the berita record
      $this->db->where('id_sekolah', $id);
      $this->db->update('tb_sekolah', $data);
      $this->session->set_flashdata('success', 'Data berhasil diupdate');
      redirect('admin/sekolah');
  }
  public function jadwal(){

    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $data['title'] = "Jadwal & Hasil";
      $this->db->select('tb_jadwal.*, s1.nama as sekolah1, s2.nama as sekolah2');
      $this->db->from('tb_jadwal');
      $this->db->join('tb_sekolah s1', 'tb_jadwal.id_sekolah1 = s1.id_sekolah', 'left'); // Relasi untuk id_sekolah1
      $this->db->join('tb_sekolah s2', 'tb_jadwal.id_sekolah2 = s2.id_sekolah', 'left'); // Relasi untuk id_sekolah2
      $data['jadwal'] = $this->db->get()->result_array();

      
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/jadwal');
      $this->load->view('admin/footer');
      
    }
  }
  public function tambah_jadwal(){
    $data['title'] = "Tambah Jadwal";
    $data['sekolah'] = $this->db->get('tb_sekolah')->result_array();
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/tambah_jadwal');
      $this->load->view('admin/footer');
    }

  }
  public function submit_jadwal(){
    $id_sekolah1 = $this->input->post('id_sekolah1');
    $id_sekolah2 = $this->input->post('id_sekolah2');
    $skor1 = $this->input->post('skor1');
    $skor2 = $this->input->post('skor2');
    $tanggal = $this->input->post('tanggal');
    $data = [
      'id_sekolah1' => $id_sekolah1,
      'id_sekolah2' => $id_sekolah2,
      'tanggal' => $tanggal,
      'skor1' => $skor1,
      'skor2' => $skor2
    ];
    $this->db->insert('tb_jadwal', $data);
    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
    redirect('admin/jadwal');
  }
  public function hapus_jadwal($id){
    //pastikan sudah login
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->db->delete('tb_jadwal', ['id_jadwal' => $id]);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/jadwal');
    }
  }

  public function edit_jadwal($id){
    $data['title'] = "Edit Jadwal";
    $data['jadwal'] = $this->db->get_where('tb_jadwal', ['id_jadwal' => $id])->row_array();
    $data['sekolah'] = $this->db->get('tb_sekolah')->result_array();
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/edit_jadwal');
      $this->load->view('admin/footer');
    }
  }
  public function update_jadwal(){
    $id = $this->input->post('id');
    $id_sekolah1 = $this->input->post('id_sekolah1');
    $id_sekolah2 = $this->input->post('id_sekolah2');
    $skor1 = $this->input->post('skor1');
    $skor2 = $this->input->post('skor2');
    $tanggal = $this->input->post('tanggal');
    $data = [
      'id_sekolah1' => $id_sekolah1,
      'id_sekolah2' => $id_sekolah2,
      'tanggal' => $tanggal,
      'skor1' => $skor1,
      'skor2' => $skor2
    ];
    $this->db->where('id_jadwal', $id);
    $this->db->update('tb_jadwal', $data);
    $this->session->set_flashdata('success', 'Data berhasil diupdate');
    redirect('admin/jadwal');
  }
  public function sponsor(){
  
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    }else{
     $data['title'] = "Sponsor";
     $data['sponsor'] = $this->db->get('tb_sponsor')->result_array();

      
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/sponsor');
      $this->load->view('admin/footer');
    }
    
  }

  public function tambah_sponsor(){
    $data['title'] = "Tambah Sponsor";
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/tambah_sponsor');
      $this->load->view('admin/footer');
    }

    
  }
public function submit_sponsor() {
      $nama = $this->input->post('nama');

      // Configuration for file upload
      $config['upload_path']          = './assets/img/sponsor/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 10000;
      $config['encrypt_name']         = TRUE; // Encrypt the file name to make it unique

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
          $gambar = $this->upload->data('file_name');
      } else {
          $this->session->set_flashdata('error', $this->upload->display_errors());
          redirect('admin/tambah_sponsor');
      }

      $data = [
          'nama' => $nama,
          'gambar' => $gambar
      ];

      $this->db->insert('tb_sponsor', $data);
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect('admin/sponsor');
  }

  public function hapus_sponsor($id){
        if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      //querykan untuk mencari gambar berita dan unlink
      $gambar = $this->db->get_where('tb_sponsor', ['id_sponsor' => $id])->row_array();
      unlink(FCPATH . 'assets/img/sponsor/' . $gambar['gambar']);
      $this->db->delete('tb_sponsor', ['id_sponsor' => $id]);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/sponsor');
    }

  }
   public function edit_sponsor($id){
    $data['title'] = "Edit Sponsor";
    $data['sponsor'] = $this->db->get_where('tb_sponsor', ['id_sponsor' => $id])->row_array();
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/edit_sponsor');
      $this->load->view('admin/footer');
    }
  }
  public function update_sponsor() {
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');

      // Configuration for file upload
      $config['upload_path']          = './assets/img/sponsor/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 10000;
      $config['encrypt_name']         = TRUE; // Encrypt the file name to make it unique

      $this->load->library('upload', $config);

      // Get current berita data to check for existing gambar
      $gambar_lama = $this->db->get_where('tb_sponsor', ['id_sponsor' => $id])->row_array();
      
      if ($_FILES['gambar']['name']) { // Check if a new file is uploaded
          if ($this->upload->do_upload('gambar')) {
              $gambar = $this->upload->data('file_name');
              
              // Delete the old image file if it exists
              if (file_exists(FCPATH . 'assets/img/sponsor/' . $gambar_lama['gambar'])) {
                  unlink(FCPATH . 'assets/img/sponsor/' . $gambar_lama['gambar']);
              }

              // Prepare data with new gambar
              $data = [
                  'nama' => $nama,
                  'gambar' => $gambar,
              ];
          } else {
              $this->session->set_flashdata('error', $this->upload->display_errors());
              redirect('admin/sponsor/' . $id);
              return;
          }
      } else {
          // If no new file is uploaded, keep the old gambar
          $data = [
              'nama' => $nama,
              'gambar' => $gambar_lama['gambar']
          ];
      }

      // Update the berita record
      $this->db->where('id_sponsor', $id);
      $this->db->update('tb_sponsor', $data);
      $this->session->set_flashdata('success', 'Data berhasil diupdate');
      redirect('admin/sponsor');
  }
  public function akun(){
    $data['title'] = "Akun";
    $data['akun'] = $this->db->get('tb_akun')->result_array();
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/akun');
      $this->load->view('admin/footer');
    }
  }
  public function hapus_akun($id){
    //pastikan sudah login
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->db->delete('tb_akun', ['id_akun' => $id]);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/akun');
    }
  }
  public function tambah_akun(){
    $data['title'] = "Tambah Akun";
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/tambah_akun');
      $this->load->view('admin/footer');
    }
  }
  public function submit_akun(){
    $email = $this->input->post('email');
    $nama = $this->input->post('nama');
    $password = $this->input->post('password');
    //cek email apakah udh kedata apa blom
    $cek = $this->db->get_where('tb_akun', ['email' => $email])->num_rows();
    if ($cek > 0) {
      $this->session->set_flashdata('error', 'Email sudah terdaftar');
      redirect('admin/tambah_akun');
    }
    $data = [
      'email' => $email,
      'nama' => $nama,
      'password' => password_hash($password, PASSWORD_DEFAULT),
      'aktif' => 1
    ];
    $this->db->insert('tb_akun', $data);
    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
    redirect('admin/akun');
  }
  public function edit_akun($id){
    $data['title'] = "Edit Akun";
    $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $id])->row_array();
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/edit_akun');
      $this->load->view('admin/footer');
    }

  }
  public function update_akun(){
    $id = $this->input->post('id');
    $nama = $this->input->post('nama');
    $password = $this->input->post('password');
    $data = [
      'nama' => $nama,
      'password' => password_hash($password, PASSWORD_DEFAULT)
    ];
    $this->db->where('id_akun', $id);
    $this->db->update('tb_akun', $data);
    $this->session->set_flashdata('success', 'Data berhasil diupdate');
    redirect('admin/akun');
  }
  public function pendaftaran(){
    $data['title'] = "Pendaftaran";
    $data['pendaftaran'] = $this->db->get('tb_pendaftaran')->result_array();
    if ($this->session->userdata('email') == '') {
      redirect('auth');
    } else {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/pendaftaran');
      $this->load->view('admin/footer');
    }
  }
  
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */