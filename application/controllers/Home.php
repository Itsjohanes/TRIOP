<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tanggal');
  }

  public function index()
  {
    $data['title'] = "Trinitas Open-Home";
    $data['menu'] = "Home";
    $data['sekolah'] = $this->db->get('tb_sekolah')->result_array();
    $data['sponsor'] = $this->db->get('tb_sponsor')->result_array();
    $data['content'] = $this->db->get('tb_content')->result_array();
    $data['videosejarah'] = $this->db->get('tb_videosejarah')->result_array();
    $data['videotestimoni'] = $this->db->get('tb_videotestimoni')->result_array();
    $data['media'] = $this->db->get('tb_media')->result_array();
    $data['kampus'] = $this->db->get('tb_kampus')->result_array();

    $this->db->select('tb_jadwal.*, s1.nama as sekolah1, s1.gambar as gambar_sekolah1, s2.nama as sekolah2, s2.gambar as gambar_sekolah2');
    $this->db->from('tb_jadwal');
    $this->db->join('tb_sekolah s1', 'tb_jadwal.id_sekolah1 = s1.id_sekolah', 'left');
    $this->db->join('tb_sekolah s2', 'tb_jadwal.id_sekolah2 = s2.id_sekolah', 'left');
    $this->db->order_by('tb_jadwal.tanggal', 'ASC');
    $this->db->where('tb_jadwal.utama', 1);
    $data['jadwal'] = $this->db->get()->result_array();

    $this->load->view('home/header', $data);
    $this->load->view('home/index', $data);
    $this->load->view('home/footer', $data);
  }

  public function berita()
  {
    $data['title'] = "Trinitas Open-Berita";
    $data['menu'] = "Berita";
    $this->db->order_by('id_berita', 'DESC');
    $data['berita'] = $this->db->get('tb_berita')->result_array();

    $this->load->view('home/header', $data);
    $this->load->view('home/berita', $data);
    $this->load->view('home/footer', $data);
  }

  public function detail_berita($id)
  {
    $data['title'] = "Trinitas Open-Detail Berita";
    $data['menu'] = "Berita";
    $data['berita'] = $this->db->get_where('tb_berita', ['id_berita' => $id])->row_array();

    $this->load->view('home/header', $data);
    $this->load->view('home/detail_berita', $data);
    $this->load->view('home/footer', $data);
  }

  public function video()
  {
    $data['title'] = "Trinitas Open-Video";
    $data['menu'] = "Video Pertandingan";
    $this->db->order_by('id_video', 'DESC');
    $data['video'] = $this->db->get('tb_video')->result_array();

    $this->load->view('home/header', $data);
    $this->load->view('home/video', $data);
    $this->load->view('home/footer', $data);
  }

  public function jadwal()
  {
    $data['title'] = "Trinitas Open-Jadwal";
    $data['menu'] = "Jadwal Pertandingan";
    $this->db->select('tb_jadwal.*, s1.nama as sekolah1, s1.gambar as gambar_sekolah1, s2.nama as sekolah2, s2.gambar as gambar_sekolah2');
    $this->db->from('tb_jadwal');
    $this->db->join('tb_sekolah s1', 'tb_jadwal.id_sekolah1 = s1.id_sekolah', 'left');
    $this->db->join('tb_sekolah s2', 'tb_jadwal.id_sekolah2 = s2.id_sekolah', 'left');
    $this->db->order_by('tb_jadwal.tanggal', 'ASC');

    $data['jadwal'] = $this->db->get()->result_array();

    $this->load->view('home/header', $data);
    $this->load->view('home/jadwal', $data);
    $this->load->view('home/footer', $data);
  }

  public function pendaftaran()
  {
    $data['title'] = "Trinitas Open-Pendaftaran";
    $data['menu'] = "Pendaftaran";

    // Retrieve registration status
    $status = $this->db->get_where('tb_aktifpendaftaran', ['id_aktifpendaftaran' => 1])->row_array()['status'];

    if ($status == 1) {
      
      $this->load->view('home/header',$data);
      $this->load->view('home/pendaftaran', $data);
    } else {
      $this->load->view('home/header',$data);
      $this->load->view('home/pendaftaran_belum', $data);
    }

    $this->load->view('home/footer', $data);
  }

  public function submit_pendaftaran()
  {
    $nama = $this->input->post('nama');
    $sekolah = $this->input->post('sekolah');
    $nomor = $this->input->post('nomor');
    
    $bukti = $_FILES['bukti']['name'];
    $bukti_tmp = $_FILES['bukti']['tmp_name'];
    $bukti_size = $_FILES['bukti']['size'];

    if ($bukti) {
      $allowed_types = ['jpg', 'jpeg', 'png'];
      $ext = pathinfo($bukti, PATHINFO_EXTENSION);

      if ($bukti_size <= 5242880 && in_array(strtolower($ext), $allowed_types)) {
        $new_bukti_name = uniqid() . '.' . $ext;
        $upload_path = 'assets/img/pendaftaran/' . $new_bukti_name;

        if (move_uploaded_file($bukti_tmp, $upload_path)) {
          $data = [
            'nama' => $nama,
            'sekolah' => $sekolah,
            'nomor' => $nomor,
            'bukti' => $new_bukti_name
          ];

          $this->db->insert('tb_pendaftaran', $data);
          $this->session->set_flashdata('category_success', 'Pendaftaran Berhasil');
          redirect('home/pendaftaran');
        } else {
          $this->session->set_flashdata('category_error', 'Gagal mengupload bukti');
        }
      } else {
        $this->session->set_flashdata('category_error', 'Ukuran file terlalu besar atau tipe file tidak didukung');
      }
    } else {
      $this->session->set_flashdata('category_error', 'Pendaftaran Gagal');
    }

    redirect('home/pendaftaran');
  }

  public function berkas()
  {
    $data['title'] = "Trinitas Open-Berkas";
    $data['menu'] = "Berkas";
    $data['berkas'] = $this->db->get('tb_berkas')->result_array();

    $this->load->view('home/header', $data);
    $this->load->view('home/berkas', $data);
    $this->load->view('home/footer', $data);
  }

  public function instagram()
  {
    $data['title'] = "Trinitas Open-Instagram";
    $data['menu'] = "Instagram";
    $this->db->order_by('id_instagram', 'DESC');
    $data['instagram'] = $this->db->get('tb_instagram')->result_array();

    $this->load->view('home/header', $data);
    $this->load->view('home/instagram', $data);
    $this->load->view('home/footer', $data);
  }

  public function content()
  {
    $data['title'] = "Trinitas Open-Content";
    $data['menu'] = "Content";
    $this->db->order_by('id_content', 'DESC');
    $data['content'] = $this->db->get('tb_content')->result_array();

    $this->load->view('home/header', $data);
    $this->load->view('home/content', $data);
    $this->load->view('home/footer', $data);
  }
}
