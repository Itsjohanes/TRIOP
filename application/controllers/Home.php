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
  }

  public function index()
  {
    $data['title'] = "Trinitas Open-Home";
    $data['menu'] = "Home";
    //ambil data sekolah
    $data['sekolah'] = $this->db->get('tb_sekolah')->result_array();
    $this->load->view('home/header', $data);
    $this->load->view('home/index', $data);
    $this->load->view('home/footer', $data);
  }
  public function berita(){
    $data['title'] = "Trinitas Open-Berita";
    $data['menu'] = "Berita";
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
    $data['video'] = $this->db->get('tb_video')->result_array();
    $this->load->view('home/header', $data);
    $this->load->view('home/video', $data);
    $this->load->view('home/footer', $data);
  }
  public function jadwal(){
    $data['title'] = "Trinitas Open-Jadwal";
    $data['menu'] = "Jadwal Pertandingan";
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
  
  
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */