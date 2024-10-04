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
    $data['videosejarah'] = $this->db->get('tb_videosejarah')->result_array();

    $this->db->select('tb_jadwal.*, s1.nama as sekolah1, s1.gambar as gambar_sekolah1, s2.nama as sekolah2, s2.gambar as gambar_sekolah2');
    $this->db->from('tb_jadwal');
    $this->db->join('tb_sekolah s1', 'tb_jadwal.id_sekolah1 = s1.id_sekolah', 'left'); // Relasi untuk id_sekolah1
    $this->db->join('tb_sekolah s2', 'tb_jadwal.id_sekolah2 = s2.id_sekolah', 'left'); // Relasi untuk id_sekolah2
    $this->db->order_by('tb_jadwal.tanggal', 'ASC');
    $this->db->where('tb_jadwal.utama', 1);
    $data['jadwal'] = $this->db->get()->result_array();
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
    $this->db->order_by('id_video', 'DESC');
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
    $this->db->order_by('tb_jadwal.tanggal', 'ASC');

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
    $bukti = $_FILES['bukti']['name']; // Get the file's original name
    $bukti_tmp = $_FILES['bukti']['tmp_name']; // Get the file's temporary path

    if ($bukti) {
        // Check if the file extension is allowed
        $allowed_types = ['jpg', 'jpeg', 'png'];
        $ext = pathinfo($bukti, PATHINFO_EXTENSION); // Get file extension

        if (in_array(strtolower($ext), $allowed_types)) {
            // Read file content and convert to base64
            $bukti_content = file_get_contents($bukti_tmp);
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
  public function berkas(){
    $data['title'] = "Trinitas Open-Berkas";
    $data['menu'] = "Berkas";
    $data['berkas'] = $this->db->get('tb_berkas')->result_array();
    $this->load->view('home/header', $data);
    $this->load->view('home/berkas', $data);
    $this->load->view('home/footer', $data);
  }
  public function instagram(){
    $data['title'] = "Trinitas Open-Instagram";
    $data['menu'] = "Instagram";
    //ambil data dari tb_instagram order desc by id_instagram
    $this->db->order_by('id_instagram', 'DESC');
    $data['instagram'] = $this->db->get('tb_instagram')->result_array();
    $this->load->view('home/header', $data);
    $this->load->view('home/instagram', $data);
    $this->load->view('home/footer', $data);
  }
  public function content(){
    $data['title'] = "Trinitas Open-Content";
    $data['menu'] = "Content";
    //ambil data dari tb_dokumentasi order desc by id_dokumentasi
    $this->db->order_by('id_content', 'DESC');
    $data['content'] = $this->db->get('tb_content')->result_array();
    $this->load->view('home/header', $data);
    $this->load->view('home/content', $data);
    $this->load->view('home/footer', $data);
  }

  
  
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
