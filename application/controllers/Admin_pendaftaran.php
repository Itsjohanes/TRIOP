<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller admin_pendaftaran
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

class Admin_pendaftaran extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Cetak_pdf');
    //auths();
    $this->load->model('Video_model'); 
    $this->load->model('Instagram_model');
    $this->load->model('Berita_model'); 
    $this->load->model('Sekolah_model');
    $this->load->model('Jadwal_model');
    $this->load->model('Sponsor_model'); 
    $this->load->model('Akun_model'); 
    $this->load->model('Pendaftaran_model'); 
    $this->load->model('Content_model'); 
    $this->load->model('Berkas_model');
    $this->load->model('Video_sejarah_model');


  }

  public function index()
  {
    $data['title'] = "Dashboard";

    $data['jumlahadmin_pendaftaran'] = $this->db->get_where('tb_akun', ['aktif' => 1])->num_rows();
    $data['jumlahVideo'] = $this->db->get('tb_video')->num_rows();
    $data['jumlahBerita'] = $this->db->get('tb_berita')->num_rows();
    $data['jumlahSekolah'] = $this->db->get('tb_sekolah')->num_rows();
    $data['jumlahJadwal'] = $this->db->get('tb_jadwal')->num_rows();
    $data['jumlahSponsor'] = $this->db->get('tb_sponsor')->num_rows();
    $data['jumlahPendaftaran'] = $this->db->get('tb_pendaftaran')->num_rows();
    $data['jumlahContent'] = $this->db->get('tb_content')->num_rows();
    $this->load->view('admin_pendaftaran/header', $data);
    $this->load->view('admin_pendaftaran/sidebar');
    $this->load->view('admin_pendaftaran/dashboard');
    $this->load->view('admin_pendaftaran/footer');
    
  }
  // Display pendaftaran data
    public function pendaftaran()
    {
        if ($this->session->userdata('email') == '') {
            redirect('auth');
        }

        $data['title'] = "Pendaftaran";
        $data['pendaftaran'] = $this->Pendaftaran_model->get_all_pendaftaran(); // Fetch data via model

        $this->load->view('admin_pendaftaran/header', $data);
        $this->load->view('admin_pendaftaran/sidebar');
        $this->load->view('admin_pendaftaran/pendaftaran');
        $this->load->view('admin_pendaftaran/footer');
    }
    public function hapus_pendaftaran($id){
        $this->Pendaftaran_model->delete_pendaftaran($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin_pendaftaran/pendaftaran');

    }
    
    public function sekolah()
    {
        $data['title'] = "Sekolah";
        $data['sekolah'] = $this->Sekolah_model->get_all_sekolah(); // Fetch data from model

        $this->load->view('admin_pendaftaran/header', $data);
        $this->load->view('admin_pendaftaran/sidebar');
        $this->load->view('admin_pendaftaran/sekolah');
        $this->load->view('admin_pendaftaran/footer');
    }

    // Load form to add a new sekolah
    public function tambah_sekolah()
    {
        $data['title'] = "Tambah Sekolah";

        $this->load->view('admin_pendaftaran/header', $data);
        $this->load->view('admin_pendaftaran/sidebar');
        $this->load->view('admin_pendaftaran/tambah_sekolah');
        $this->load->view('admin_pendaftaran/footer');
    }

    // Handle submission of a new sekolah
    public function submit_sekolah()
    {
        $nama = $this->input->post('nama');

        // Configuration for file upload
        $config['upload_path'] = './assets/img/sekolah/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin_pendaftaran/tambah_sekolah');
        }

        $data = [
            'nama' => $nama,
            'gambar' => $gambar
        ];

        $this->Sekolah_model->insert_sekolah($data); // Insert via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin_pendaftaran/sekolah');
    }

    // Delete a sekolah
    public function hapus_sekolah($id)
    {
        $gambar = $this->Sekolah_model->get_sekolah_by_id($id); // Get image data for deletion
        unlink(FCPATH . 'assets/img/sekolah/' . $gambar['gambar']); // Delete image file
        $this->Sekolah_model->delete_sekolah($id); // Delete record via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin_pendaftaran/sekolah');
    }

    // Load form to edit sekolah
    public function edit_sekolah($id)
    {
        $data['title'] = "Edit Sekolah";
        $data['sekolah'] = $this->Sekolah_model->get_sekolah_by_id($id); // Fetch data via model

        $this->load->view('admin_pendaftaran/header', $data);
        $this->load->view('admin_pendaftaran/sidebar');
        $this->load->view('admin_pendaftaran/edit_sekolah');
        $this->load->view('admin_pendaftaran/footer');
    }

    // Handle updating sekolah
    public function update_sekolah()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');

        // Configuration for file upload
        $config['upload_path'] = './assets/img/sekolah/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        // Get current sekolah data
        $gambar_lama = $this->Sekolah_model->get_sekolah_by_id($id);

        if ($_FILES['gambar']['name']) { // Check if new file is uploaded
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');

                // Delete old image if exists
                if (file_exists(FCPATH . 'assets/img/sekolah/' . $gambar_lama['gambar'])) {
                    unlink(FCPATH . 'assets/img/sekolah/' . $gambar_lama['gambar']);
                }

                // Prepare data with new image
                $data = [
                    'nama' => $nama,
                    'gambar' => $gambar
                ];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin_pendaftaran/edit_sekolah/' . $id);
                return;
            }
        } else {
            // Update without changing the image
            $data = [
                'nama' => $nama,
                'gambar' => $gambar_lama['gambar']
            ];
        }

        $this->Sekolah_model->update_sekolah($id, $data); // Update via model
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin_pendaftaran/sekolah');
    }


   
  

  
}


/* End of file admin_pendaftaran.php */
/* Location: ./application/controllers/admin_pendaftaran.php */