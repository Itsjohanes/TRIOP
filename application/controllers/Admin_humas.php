<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller admin_humas
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

class Admin_humas extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Cetak_pdf');
    auths();
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

    $data['jumlahadmin_humas'] = $this->db->get_where('tb_akun', ['aktif' => 1])->num_rows();
    $data['jumlahVideo'] = $this->db->get('tb_video')->num_rows();
    $data['jumlahBerita'] = $this->db->get('tb_berita')->num_rows();
    $data['jumlahSekolah'] = $this->db->get('tb_sekolah')->num_rows();
    $data['jumlahJadwal'] = $this->db->get('tb_jadwal')->num_rows();
    $data['jumlahSponsor'] = $this->db->get('tb_sponsor')->num_rows();
    $data['jumlahPendaftaran'] = $this->db->get('tb_pendaftaran')->num_rows();
    $data['jumlahContent'] = $this->db->get('tb_content')->num_rows();
    $this->load->view('admin_humas/header', $data);
    $this->load->view('admin_humas/sidebar');
    $this->load->view('admin_humas/dashboard');
    $this->load->view('admin_humas/footer');
    
  }
    public function video()
    {
        $data['title'] = "Video Pertandingan";
        $data['video'] = $this->Video_model->get_all_videos(); // Fetch from model
        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/video');
        $this->load->view('admin_humas/footer');
    }

    // Load the form to add a new video
    public function tambah_video()
    {
        $data['title'] = "Tambah Video";
        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/tambah_video');
        $this->load->view('admin_humas/footer');
    }

    // Handle the submission of a new video
    public function submit_video()
    {
        $judul = $this->input->post('judul');
        $link = $this->input->post('link');

        $data = [
            'judul' => $judul,
            'link' => $link
        ];

        $this->Video_model->insert_video($data); // Insert through the model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin_humas/video');
    }

    // Delete a video
    public function hapus_video($id)
    {
        $this->Video_model->delete_video($id); // Delete via the model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin_humas/video');
    }

    // Load the form to edit a video
    public function edit_video($id)
    {
        $data['title'] = "Edit Video";
        $data['video'] = $this->Video_model->get_video_by_id($id); // Fetch specific video via model

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/edit_video');
        $this->load->view('admin_humas/footer');
    }

    // Handle video update (if applicable)
    public function update_video()
    {
        $judul = $this->input->post('judul');
        $link = $this->input->post('link');
        $id = $this->input->post('id');

        $data = [
            'judul' => $judul,
            'link' => $link
        ];

        $this->Video_model->update_video($id, $data); // Update via the model
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin_humas/video');
    }
  
    // Display all berita
    public function berita()
    {
        $data['title'] = "Berita Seputar TRIOP";
        $data['berita'] = $this->Berita_model->get_all_berita(); // Fetch from model

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/berita');
        $this->load->view('admin_humas/footer');
    }

    // Load form to add a new berita
    public function tambah_berita()
    {
        $data['title'] = "Tambah Berita";

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/tambah_berita');
        $this->load->view('admin_humas/footer');
    }

    // Handle submission of a new berita
    public function submit_berita()
    {
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');

        // Configuration for file upload
        $config['upload_path'] = './assets/img/berita/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin_humas/tambah_berita');
        }

        $data = [
            'judul' => $judul,
            'isi' => $isi,
            'gambar' => $gambar
        ];

        $this->Berita_model->insert_berita($data); // Insert via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin_humas/berita');
    }

    // Delete a berita
    public function hapus_berita($id)
    {
        $gambar = $this->Berita_model->get_berita_by_id($id); // Get image file to delete
        unlink(FCPATH . 'assets/img/berita/' . $gambar['gambar']); // Delete image file
        $this->Berita_model->delete_berita($id); // Delete berita via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin_humas/berita');
    }

    // Load form to edit a berita
    public function edit_berita($id)
    {
        $data['title'] = "Edit Berita";
        $data['berita'] = $this->Berita_model->get_berita_by_id($id); // Fetch berita via model

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/edit_berita');
        $this->load->view('admin_humas/footer');
    }

    // Handle updating a berita
    public function update_berita()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');

        // Configuration for file upload
        $config['upload_path'] = './assets/img/berita/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        // Get current berita data
        $gambar_lama = $this->Berita_model->get_berita_by_id($id);

        if ($_FILES['gambar']['name']) { // Check if new file is uploaded
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');

                // Delete old image if it exists
                if (file_exists(FCPATH . 'assets/img/berita/' . $gambar_lama['gambar'])) {
                    unlink(FCPATH . 'assets/img/berita/' . $gambar_lama['gambar']);
                }

                // Update with new image
                $data = [
                    'judul' => $judul,
                    'isi' => $isi,
                    'gambar' => $gambar
                ];
            } else {
                $this->Berita_model->update_berita($id, $data); // Update via model

                redirect('admin_humas/berita/' . $id);
                return;
            }
        } else {
            // Update without changing the image
            $data = [
                'judul' => $judul,
                'isi' => $isi,
                'gambar' => $gambar_lama['gambar']
            ];
        }

        $this->Berita_model->update_berita($id, $data); // Update via model
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin_humas/berita');
    }
    public function sekolah()
    {
        $data['title'] = "Sekolah";
        $data['sekolah'] = $this->Sekolah_model->get_all_sekolah(); // Fetch data from model

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/sekolah');
        $this->load->view('admin_humas/footer');
    }

    // Load form to add a new sekolah
    public function tambah_sekolah()
    {
        $data['title'] = "Tambah Sekolah";

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/tambah_sekolah');
        $this->load->view('admin_humas/footer');
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
            redirect('admin_humas/tambah_sekolah');
        }

        $data = [
            'nama' => $nama,
            'gambar' => $gambar
        ];

        $this->Sekolah_model->insert_sekolah($data); // Insert via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin_humas/sekolah');
    }

    // Delete a sekolah
    public function hapus_sekolah($id)
    {
        $gambar = $this->Sekolah_model->get_sekolah_by_id($id); // Get image data for deletion
        unlink(FCPATH . 'assets/img/sekolah/' . $gambar['gambar']); // Delete image file
        $this->Sekolah_model->delete_sekolah($id); // Delete record via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin_humas/sekolah');
    }

    // Load form to edit sekolah
    public function edit_sekolah($id)
    {
        $data['title'] = "Edit Sekolah";
        $data['sekolah'] = $this->Sekolah_model->get_sekolah_by_id($id); // Fetch data via model

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/edit_sekolah');
        $this->load->view('admin_humas/footer');
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
                redirect('admin_humas/edit_sekolah/' . $id);
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
        redirect('admin_humas/sekolah');
    }


    // Display all jadwal
    public function jadwal()
    {
        $data['title'] = "Jadwal & Hasil";
        $data['jadwal'] = $this->Jadwal_model->get_all_jadwal(); // Fetch data from model

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/jadwal');
        $this->load->view('admin_humas/footer');
    }

    // Load form to add a new jadwal
    public function tambah_jadwal()
    {
        $data['title'] = "Tambah Jadwal";
        $data['sekolah'] = $this->Sekolah_model->get_all_sekolah(); // Fetch all schools for selection

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/tambah_jadwal');
        $this->load->view('admin_humas/footer');
    }

    // Handle submission of a new jadwal
    public function submit_jadwal()
    {
        $id_sekolah1 = $this->input->post('id_sekolah1');
        $id_sekolah2 = $this->input->post('id_sekolah2');
        $skor1 = $this->input->post('skor1');
        $skor2 = $this->input->post('skor2');
        $tanggal = $this->input->post('tanggal');
        $tiket = $this->input->post('tiket');

        $data = [
            'id_sekolah1' => $id_sekolah1,
            'id_sekolah2' => $id_sekolah2,
            'tanggal' => $tanggal,
            'skor1' => $skor1,
            'skor2' => $skor2,
            'tiket' => $tiket,
            'utama' => 0
        ];

        $this->Jadwal_model->insert_jadwal($data); // Insert via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin_humas/jadwal');
    }
    public function nyalakan_jadwal_utama($id){
        $this->db->query("UPDATE tb_jadwal SET utama = 0");
        $this->db->query("UPDATE tb_jadwal SET utama = 1 WHERE id_jadwal = $id");
        $this->session->set_flashdata('success', 'Jadwal berhasil dijadikan utama');
        redirect('admin_humas/jadwal');
    }

    // Delete a jadwal
    public function hapus_jadwal($id)
    {
        $this->Jadwal_model->delete_jadwal($id); // Delete via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin_humas/jadwal');
    }

    // Load form to edit jadwal
    public function edit_jadwal($id)
    {
        $data['title'] = "Edit Jadwal";
        $data['jadwal'] = $this->Jadwal_model->get_jadwal_by_id($id); // Fetch data via model
        $data['sekolah'] = $this->Sekolah_model->get_all_sekolah(); // Fetch schools for selection

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/edit_jadwal');
        $this->load->view('admin_humas/footer');
    }

    // Handle updating jadwal
    public function update_jadwal()
    {
        $id = $this->input->post('id');
        $id_sekolah1 = $this->input->post('id_sekolah1');
        $id_sekolah2 = $this->input->post('id_sekolah2');
        $skor1 = $this->input->post('skor1');
        $skor2 = $this->input->post('skor2');
        $tanggal = $this->input->post('tanggal');
        $tiket = $this->input->post('tiket');

        $data = [
            'id_sekolah1' => $id_sekolah1,
            'id_sekolah2' => $id_sekolah2,
            'tanggal' => $tanggal,
            'skor1' => $skor1,
            'skor2' => $skor2,
            'tiket' => $tiket
        ];

        $this->Jadwal_model->update_jadwal($id, $data); // Update via model
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin_humas/jadwal');
    }
    public function sponsor()
    {
        $data['title'] = "Sponsor";
        $data['sponsor'] = $this->Sponsor_model->get_all_sponsors(); // Fetch data via the model

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/sponsor');
        $this->load->view('admin_humas/footer');
    }

    // Load form to add a new sponsor
    public function tambah_sponsor()
    {
        $data['title'] = "Tambah Sponsor";

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/tambah_sponsor');
        $this->load->view('admin_humas/footer');
    }

    // Handle submission of a new sponsor
    public function submit_sponsor()
    {
        $nama = $this->input->post('nama');
        
        // File upload configuration
        $config['upload_path']   = './assets/img/sponsor/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 10000;
        $config['encrypt_name']  = TRUE; // Encrypt file name to make it unique

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin_humas/tambah_sponsor');
        }

        $data = [
            'nama' => $nama,
            'gambar' => $gambar
        ];

        $this->Sponsor_model->insert_sponsor($data); // Insert sponsor via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin_humas/sponsor');
    }

    // Delete a sponsor
    public function hapus_sponsor($id)
    {
        $this->Sponsor_model->delete_sponsor($id); // Delete sponsor via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin_humas/sponsor');
    }

    // Load form to edit sponsor
    public function edit_sponsor($id)
    {
        $data['title'] = "Edit Sponsor";
        $data['sponsor'] = $this->Sponsor_model->get_sponsor_by_id($id); // Fetch data via the model

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/edit_sponsor');
        $this->load->view('admin_humas/footer');
    }

    // Handle updating sponsor
    public function update_sponsor()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        
        // File upload configuration
        $config['upload_path']   = './assets/img/sponsor/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 10000;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        $sponsor_lama = $this->Sponsor_model->get_sponsor_by_id($id); // Get the old sponsor data
        
        if ($_FILES['gambar']['name']) {
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
                
                // Delete old image file if it exists
                if (file_exists(FCPATH . 'assets/img/sponsor/' . $sponsor_lama['gambar'])) {
                    unlink(FCPATH . 'assets/img/sponsor/' . $sponsor_lama['gambar']);
                }

                // Update with the new image
                $data = [
                    'nama' => $nama,
                    'gambar' => $gambar,
                ];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin_humas/edit_sponsor/' . $id);
                return;
            }
        } else {
            // If no new image is uploaded, keep the old image
            $data = [
                'nama' => $nama,
                'gambar' => $sponsor_lama['gambar'],
            ];
        }

        $this->Sponsor_model->update_sponsor($id, $data); // Update sponsor via model
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin_humas/sponsor');
    }

   
   // Display content data
    public function content()
    {
        $data['title'] = "Content";
        $data['content'] = $this->Content_model->get_all_content(); // Fetch data via model

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/content');
        $this->load->view('admin_humas/footer');
    }

    // Show add content form
    public function tambah_content()
    {
        $data['title'] = "Tambah Content";

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/tambah_content');
        $this->load->view('admin_humas/footer');
    }

    // Submit new content
    public function submit_content()
    {
        $judul = $this->input->post('judul');

        // Configuration for file upload
        $config['upload_path'] = './assets/img/content/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
        $config['encrypt_name'] = TRUE; // Encrypt the file name to make it unique

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin_humas/tambah_content');
            return;
        }

        $data = [
            'judul' => $judul,
            'gambar' => $gambar
        ];

        $this->Content_model->insert_content($data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin_humas/content');
    }

    // Delete content
    public function hapus_content($id)
    {
        // Get current content data to check for existing gambar
        $gambar = $this->Content_model->get_content_by_id($id);
        unlink(FCPATH . 'assets/img/content/' . $gambar['gambar']);

        $this->Content_model->delete_content($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin_humas/content');
    }

    // Show edit content form
    public function edit_content($id)
    {
        $data['title'] = "Edit Content";
        $data['content'] = $this->Content_model->get_content_by_id($id);

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/edit_content');
        $this->load->view('admin_humas/footer');
    }

    // Update content
    public function update_content()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');

        // Configuration for file upload
        $config['upload_path'] = './assets/img/content/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
        $config['encrypt_name'] = TRUE; // Encrypt the file name to make it unique

        $this->load->library('upload', $config);

        // Get current content data to check for existing gambar
        $gambar_lama = $this->Content_model->get_content_by_id($id);

        if ($_FILES['gambar']['name']) { // Check if a new file is uploaded
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');

                // Delete the old image file if it exists
                if (file_exists(FCPATH . 'assets/img/content/' . $gambar_lama['gambar'])) {
                    unlink(FCPATH . 'assets/img/content/' . $gambar_lama['gambar']);
                }

                // Prepare data with new gambar
                $data = [
                    'judul' => $judul,
                    'gambar' => $gambar,
                ];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin_humas/content/' . $id);
                return;
            }
        } else {
            // If no new file is uploaded, keep the old gambar
            $data = [
                'judul' => $judul,
                'gambar' => $gambar_lama['gambar']
            ];
        }

        // Update the content record
        $this->Content_model->update_content($id, $data);
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin_humas/content');
    }

    //berkas
    public function berkas()
    {
        $data['title'] = "Berkas";
        $data['berkas'] = $this->Berkas_model->get_all_berkas(); // Fetch data via model
        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/berkas');
        $this->load->view('admin_humas/footer');
    }
    //Tambah Berkas
    public function tambah_berkas()
    {
        $data['title'] = "Tambah Berkas";
        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/tambah_berkas');
        $this->load->view('admin_humas/footer');
    }
    //submit berkas
    public function submit_berkas()
    {
        $nama = $this->input->post('nama');

        // Configuration for file upload
        $config['upload_path'] = './assets/berkas/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('berkas')) {
            $berkas = $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin_humas/tambah_berkas');
        }

        $data = [
            'nama' => $nama,
            'file' => $berkas
        ];

        $this->Berkas_model->insert_berkas($data); // Insert via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin_humas/berkas');
    }
    //hapus berkas
    public function hapus_berkas($id)
    {
        $berkas = $this->Berkas_model->get_berkas_by_id($id); // Get file data for deletion
        unlink(FCPATH . 'assets/berkas/' . $berkas['file']); // Delete file
        $this->Berkas_model->delete_berkas($id); // Delete record via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin_humas/berkas');
    }

    //edit berkas
    public function edit_berkas($id)
    {
        $data['title'] = "Edit Berkas";
        $data['berkas'] = $this->Berkas_model->get_berkas_by_id($id); // Fetch data via model

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/edit_berkas');
        $this->load->view('admin_humas/footer');
    }

    //submit hasil edit berkas
    public function update_berkas()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');

        // Configuration for file upload
        $config['upload_path'] = './assets/berkas/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        // Get current berkas data
        $berkas_lama = $this->Berkas_model->get_berkas_by_id($id);

        if ($_FILES['berkas']['name']) { // Check if new file is uploaded
            if ($this->upload->do_upload('berkas')) {
                $berkas = $this->upload->data('file_name');

                // Delete old file if it exists
                if (file_exists(FCPATH . 'assets/berkas/' . $berkas_lama['file'])) {
                    unlink(FCPATH . 'assets/berkas/' . $berkas_lama['file']);
                }

                // Prepare data with new file
                $data = [
                    'nama' => $nama,
                    'file' => $berkas
                ];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin_humas/edit_berkas/' . $id);
                return;
            }
        } else {
            // Update without changing the file
            $data = [
                'nama' => $nama,
                'file' => $berkas_lama['file']
            ];
        }

        $this->Berkas_model->update_berkas($id, $data); // Update via model
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin_humas/berkas');
    }
    //video sejarah
    public function video_sejarah()
    {
        $data['title'] = "Video Sejarah";
        $data['video_sejarah'] = $this->Video_sejarah_model->get_all_video_sejarah(); // Fetch data via model
        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/video_sejarah');
        $this->load->view('admin_humas/footer');
    }
    //tambah video sejarah
    public function tambah_video_sejarah()
    {
        $data['title'] = "Tambah Video Sejarah";
        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/tambah_video_sejarah');
        $this->load->view('admin_humas/footer');
    }
    //submit video sejarah
    public function submit_video_sejarah()
    {
        $judul = $this->input->post('judul');
        $link = $this->input->post('link');
        $tahun = $this->input->post('tahun');
        $data = [
            'judul' => $judul,
            'link' => $link,
            'tahun' => $tahun
        ];

        $this->Video_sejarah_model->insert_video_sejarah($data); // Insert via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin_humas/video_sejarah');
    }
    //hapus video sejarah
    public function hapus_video_sejarah($id)
    {
        $this->Video_sejarah_model->delete_video_sejarah($id); // Delete via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin_humas/video_sejarah');
    }
    //edit video sejarah
    public function edit_video_sejarah($id)
    {
        $data['title'] = "Edit Video Sejarah";
        $data['video_sejarah'] = $this->Video_sejarah_model->get_video_sejarah_by_id($id); // Fetch data via model

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/edit_video_sejarah');
        $this->load->view('admin_humas/footer');
    }

    // Display pendaftaran data
    public function pendaftaran()
    {
        if ($this->session->userdata('email') == '') {
            redirect('auth');
        }

        $data['title'] = "Pendaftaran";
        $data['pendaftaran'] = $this->Pendaftaran_model->get_all_pendaftaran(); // Fetch data via model

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/pendaftaran');
        $this->load->view('admin_humas/footer');
    }
	public function ubahStatusPendaftaran()
    {
        $status = $this->input->post('status');
        $newStatus = $status == 1 ? 0 : 1;  // Toggle status
    
        $this->db->set('status', $newStatus);
        $this->db->where('id_aktifpendaftaran', 1); // Assuming there’s only one entry for registration status
        $this->db->update('tb_aktifpendaftaran'); 
    
        $this->session->set_flashdata('category_success', 'Status pendaftaran berhasil diubah.');
        redirect('admin_humas/pendaftaran');
    }
 public function hapus_pendaftaran($id) {
    // Ambil data pendaftaran berdasarkan ID
    $pendaftaran = $this->Pendaftaran_model->get_pendaftaran_by_id($id);
    
    if ($pendaftaran) {
        $file_path = './assets/img/pendaftaran/' . $pendaftaran['bukti']; // Lokasi gambar
        
        // Cek apakah file gambar ada di direktori
        if (file_exists($file_path)) {
            // Hapus file gambar dari direktori
            unlink($file_path);
        }

        // Hapus data pendaftaran dari database
        $this->Pendaftaran_model->delete_pendaftaran($id);

        // Set flashdata untuk pesan sukses
        $this->session->set_flashdata('success', 'Data dan file gambar berhasil dihapus');
    } else {
        // Jika data tidak ditemukan
        $this->session->set_flashdata('error', 'Data tidak ditemukan');
    }

    // Redirect kembali ke halaman admin pendaftaran
    redirect('admin_humas/pendaftaran');
}

    //submit hasil edit video sejarah
    public function update_video_sejarah()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $tahun = $this->input->post('tahun');
        $link = $this->input->post('link');

        $data = [
            'judul' => $judul,
            'link' => $link,
            'tahun' => $tahun
        ];

        $this->Video_sejarah_model->update_video_sejarah($id, $data); // Update via model
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin_humas/video_sejarah');
    }
    public function instagram()
    {
        $data['title'] = "Instagram";
        $data['instagram'] = $this->Instagram_model->get_all_instagram(); // Fetch from model
        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/instagram');
        $this->load->view('admin_humas/footer');
    }

    // Load the form to add a new video
    public function tambah_instagram()
    {
        $data['title'] = "Tambah Instagram";
        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/tambah_instagram');
        $this->load->view('admin_humas/footer');
    }

    // Handle the submission of a new video
    public function submit_instagram()
    {
        $link = $this->input->post('link');

        $data = [
            'link' => $link
        ];

        $this->Instagram_model->insert_instagram($data); // Insert through the model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin_humas/instagram');
    }

    // Delete a video
    public function hapus_instagram($id)
    {
        $this->Instagram_model->delete_instagram($id); // Delete via the model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin_humas/instagram');
    }

    // Load the form to edit a instagram
    public function edit_instagram($id)
    {
        $data['title'] = "Edit Instagram";
        $data['instagram'] = $this->Instagram_model->get_instagram_by_id($id); // Fetch specific video via model

        $this->load->view('admin_humas/header', $data);
        $this->load->view('admin_humas/sidebar');
        $this->load->view('admin_humas/edit_instagram');
        $this->load->view('admin_humas/footer');
    }

    // Handle instagram update (if applicable)
    public function update_instagram()
    {
        $link = $this->input->post('link');
        $id = $this->input->post('id');

        $data = [
            'link' => $link
        ];

        $this->Instagram_model->update_instagram($id, $data); // Update via the model
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin_humas/instagram');
    }
  

  
}


/* End of file admin_humas.php */
/* Location: ./application/controllers/admin_humas.php */
