<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Home
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

class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tanggal'); // Load helper tanggal

  }

  public function index()
  {
    $data['title'] = "Trinitas Open-Home";
    $data['menu'] = "Home";
    //ambil data sekolah
    $data['sekolah'] = $this->db->get('tb_sekolah')->result_array();
    $data['sponsor'] = $this->db->get('tb_sponsor')->result_array();
    $data['content'] = $this->db->get('tb_content')->result_array();
    $this->load->view('home/header', $data);
    $this->load->view('home/index', $data);
    $this->load->view('home/footer', $data);
  }
  public function berita(){
    $data['title'] = "Trinitas Open-Berita";
    $data['menu'] = "Berita";
    $this->db->order_by('id_berita', 'DESC');
    $data['berita'] = $this->db->get('tb_berita')->result_array();
    $this->load->view('home/header', $data);
    $this->load->view('home/berita', $data);
    $this->load->view('home/footer', $data);
  }
  public function detail_berita($id){
    $data['title'] = "Trinitas Open-Detail Berita";
    $data['menu'] = "Berita";
    $data['berita'] = $this->db->get_where('tb_berita', ['id_berita' => $id])->row_array();
    $this->load->view('home/header', $data);
    $this->load->view('home/detail_berita', $data);
    $this->load->view('home/footer', $data);
  }
  public function video(){
    $data['title'] = "Trinitas Open-Video";
    $data['menu'] = "Video Pertandingan";
    //Menarik tb_video
    //order desc
    $this->db->order_by('id_youtube', 'DESC');
    $data['video'] = $this->db->get('tb_video')->result_array();
    $this->load->view('home/header', $data);
    $this->load->view('home/video', $data);
    $this->load->view('home/footer', $data);
  }
  public function jadwal(){
    $data['title'] = "Trinitas Open-Jadwal";
    $data['menu'] = "Jadwal Pertandingan";
    $this->db->select('tb_jadwal.*, s1.nama as sekolah1, s1.gambar as gambar_sekolah1, s2.nama as sekolah2, s2.gambar as gambar_sekolah2');
    $this->db->from('tb_jadwal');
    $this->db->join('tb_sekolah s1', 'tb_jadwal.id_sekolah1 = s1.id_sekolah', 'left'); // Relasi untuk id_sekolah1
    $this->db->join('tb_sekolah s2', 'tb_jadwal.id_sekolah2 = s2.id_sekolah', 'left'); // Relasi untuk id_sekolah2
    $this->db->order_by('tb_jadwal.id_jadwal', 'DESC');
    $data['jadwal'] = $this->db->get()->result_array();
    $this->load->view('home/header', $data);
    $this->load->view('home/jadwal', $data);
    $this->load->view('home/footer', $data);
  }
  public function pendaftaran(){
    $data['title'] = "Trinitas Open-Pendaftaran";
    $data['menu'] = "Pendaftaran";
    $this->load->view('home/header', $data);
    $this->load->view('home/pendaftaran', $data);
    $this->load->view('home/footer', $data);
  }
  public function submit_pendaftaran(){
      $nama = $this->input->post('nama');
      $sekolah = $this->input->post('sekolah');
      $nomor = $this->input->post('nomor');
      $bukti = $_FILES['bukti']['tmp_name']; // Get the file's temporary path

      if ($bukti) {
          $allowed_types = ['image/jpg', 'image/jpeg', 'image/png'];
          $mime_type = mime_content_type($bukti); // Check file mime type

          if (in_array($mime_type, $allowed_types)) {
              // Read file content and convert to base64
              $bukti_content = file_get_contents($bukti);
              $bukti_base64 = base64_encode($bukti_content);
              $data = [
                  'nama' => $nama,
                  'sekolah' => $sekolah,
                  'nomor' => $nomor,
                  'bukti' => $bukti_base64 // Save base64 image
              ];
              $this->db->insert('tb_pendaftaran', $data);
              $this->session->set_flashdata('category_success', 'Pendaftaran Berhasil');
              redirect('home/pendaftaran');
          } else {
              $this->session->set_flashdata('category_error', 'Tipe file tidak didukung');
              redirect('home/pendaftaran');
          }
      } else {
          $this->session->set_flashdata('category_error', 'Pendaftaran Gagal');
          redirect('home/pendaftaran');
      }
  }

  
  
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */