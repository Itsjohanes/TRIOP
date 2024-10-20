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
    $this->load->model('Video_testimoni_model');
    $this->load->model('Kampus_model');
    $this->load->model('Media_model');


  }

  public function index()
  {
    $data['title'] = "Dashboard";

    $data['jumlahAdmin'] = $this->db->get_where('tb_akun', ['aktif' => 1])->num_rows();
    $data['jumlahVideo'] = $this->db->get('tb_video')->num_rows();
    $data['jumlahBerita'] = $this->db->get('tb_berita')->num_rows();
    $data['jumlahSekolah'] = $this->db->get('tb_sekolah')->num_rows();
    $data['jumlahJadwal'] = $this->db->get('tb_jadwal')->num_rows();
    $data['jumlahSponsor'] = $this->db->get('tb_sponsor')->num_rows();
    $data['jumlahPendaftaran'] = $this->db->get('tb_pendaftaran')->num_rows();
    $data['jumlahContent'] = $this->db->get('tb_content')->num_rows();
    $data['jumlahKampus'] = $this->db->get('tb_kampus')->num_rows();
    $data['jumlahMedia'] = $this->db->get('tb_media')->num_rows();
    $data['jumlahTestimoni'] = $this->db->get('tb_videotestimoni')->num_rows();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar');
    $this->load->view('admin/dashboard');
    $this->load->view('admin/footer');
    
  }
    public function video()
    {
        $data['title'] = "Video Pertandingan";
        $data['video'] = $this->Video_model->get_all_videos(); // Fetch from model
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/video');
        $this->load->view('admin/footer');
    }

    // Load the form to add a new video
    public function tambah_video()
    {
        $data['title'] = "Tambah Video";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tambah_video');
        $this->load->view('admin/footer');
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
        redirect('admin/video');
    }

    // Delete a video
    public function hapus_video($id)
    {
        $this->Video_model->delete_video($id); // Delete via the model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/video');
    }

    // Load the form to edit a video
    public function edit_video($id)
    {
        $data['title'] = "Edit Video";
        $data['video'] = $this->Video_model->get_video_by_id($id); // Fetch specific video via model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_video');
        $this->load->view('admin/footer');
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
        redirect('admin/video');
    }
  
    // Display all berita
    public function berita()
    {
        $data['title'] = "Berita Seputar TRIOP";
        $data['berita'] = $this->Berita_model->get_all_berita(); // Fetch from model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/berita');
        $this->load->view('admin/footer');
    }

    // Load form to add a new berita
    public function tambah_berita()
    {
        $data['title'] = "Tambah Berita";

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tambah_berita');
        $this->load->view('admin/footer');
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
            redirect('admin/tambah_berita');
        }

        $data = [
            'judul' => $judul,
            'isi' => $isi,
            'gambar' => $gambar
        ];

        $this->Berita_model->insert_berita($data); // Insert via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin/berita');
    }

    // Delete a berita
    public function hapus_berita($id)
    {
        $gambar = $this->Berita_model->get_berita_by_id($id); // Get image file to delete
        unlink(FCPATH . 'assets/img/berita/' . $gambar['gambar']); // Delete image file
        $this->Berita_model->delete_berita($id); // Delete berita via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/berita');
    }

    // Load form to edit a berita
    public function edit_berita($id)
    {
        $data['title'] = "Edit Berita";
        $data['berita'] = $this->Berita_model->get_berita_by_id($id); // Fetch berita via model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_berita');
        $this->load->view('admin/footer');
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

                redirect('admin/berita/' . $id);
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
        redirect('admin/berita');
    }
    public function sekolah()
    {
        $data['title'] = "Sekolah";
        $data['sekolah'] = $this->Sekolah_model->get_all_sekolah(); // Fetch data from model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/sekolah');
        $this->load->view('admin/footer');
    }

    // Load form to add a new sekolah
    public function tambah_sekolah()
    {
        $data['title'] = "Tambah Sekolah";

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tambah_sekolah');
        $this->load->view('admin/footer');
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
            redirect('admin/tambah_sekolah');
        }

        $data = [
            'nama' => $nama,
            'gambar' => $gambar
        ];

        $this->Sekolah_model->insert_sekolah($data); // Insert via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin/sekolah');
    }

    // Delete a sekolah
    public function hapus_sekolah($id)
    {
        $gambar = $this->Sekolah_model->get_sekolah_by_id($id); // Get image data for deletion
        unlink(FCPATH . 'assets/img/sekolah/' . $gambar['gambar']); // Delete image file
        $this->Sekolah_model->delete_sekolah($id); // Delete record via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/sekolah');
    }

    // Load form to edit sekolah
    public function edit_sekolah($id)
    {
        $data['title'] = "Edit Sekolah";
        $data['sekolah'] = $this->Sekolah_model->get_sekolah_by_id($id); // Fetch data via model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_sekolah');
        $this->load->view('admin/footer');
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
                redirect('admin/edit_sekolah/' . $id);
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
        redirect('admin/sekolah');
    }


    // Display all jadwal
    public function jadwal()
    {
        $data['title'] = "Jadwal & Hasil";
        $data['jadwal'] = $this->Jadwal_model->get_all_jadwal(); // Fetch data from model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/jadwal');
        $this->load->view('admin/footer');
    }

    // Load form to add a new jadwal
    public function tambah_jadwal()
    {
        $data['title'] = "Tambah Jadwal";
        $data['sekolah'] = $this->Sekolah_model->get_all_sekolah(); // Fetch all schools for selection

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tambah_jadwal');
        $this->load->view('admin/footer');
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
        redirect('admin/jadwal');
    }
    public function nyalakan_jadwal_utama($id){
        $this->db->query("UPDATE tb_jadwal SET utama = 0");
        $this->db->query("UPDATE tb_jadwal SET utama = 1 WHERE id_jadwal = $id");
        $this->session->set_flashdata('success', 'Jadwal berhasil dijadikan utama');
        redirect('admin/jadwal');
    }

    // Delete a jadwal
    public function hapus_jadwal($id)
    {
        $this->Jadwal_model->delete_jadwal($id); // Delete via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/jadwal');
    }

    // Load form to edit jadwal
    public function edit_jadwal($id)
    {
        $data['title'] = "Edit Jadwal";
        $data['jadwal'] = $this->Jadwal_model->get_jadwal_by_id($id); // Fetch data via model
        $data['sekolah'] = $this->Sekolah_model->get_all_sekolah(); // Fetch schools for selection

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_jadwal');
        $this->load->view('admin/footer');
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
        redirect('admin/jadwal');
    }
    public function sponsor()
    {
        $data['title'] = "Sponsor";
        $data['sponsor'] = $this->Sponsor_model->get_all_sponsors(); // Fetch data via the model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/sponsor');
        $this->load->view('admin/footer');
    }

    // Load form to add a new sponsor
    public function tambah_sponsor()
    {
        $data['title'] = "Tambah Sponsor";

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tambah_sponsor');
        $this->load->view('admin/footer');
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
            redirect('admin/tambah_sponsor');
        }

        $data = [
            'nama' => $nama,
            'gambar' => $gambar
        ];

        $this->Sponsor_model->insert_sponsor($data); // Insert sponsor via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin/sponsor');
    }

    // Delete a sponsor
    public function hapus_sponsor($id)
    {
        $this->Sponsor_model->delete_sponsor($id); // Delete sponsor via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/sponsor');
    }

    // Load form to edit sponsor
    public function edit_sponsor($id)
    {
        $data['title'] = "Edit Sponsor";
        $data['sponsor'] = $this->Sponsor_model->get_sponsor_by_id($id); // Fetch data via the model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_sponsor');
        $this->load->view('admin/footer');
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
                redirect('admin/edit_sponsor/' . $id);
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
        redirect('admin/sponsor');
    }


    public function media()
    {
        $data['title'] = "Media";
        $data['media'] = $this->Media_model->get_all_medias(); // Fetch data via the model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/media');
        $this->load->view('admin/footer');
    }

    // Load form to add a new sponsor
    public function tambah_media()
    {
        $data['title'] = "Tambah media";

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tambah_media');
        $this->load->view('admin/footer');
    }

    // Handle submission of a new sponsor
    public function submit_media()
    {
        $nama = $this->input->post('nama');
        
        // File upload configuration
        $config['upload_path']   = './assets/img/media/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 10000;
        $config['encrypt_name']  = TRUE; // Encrypt file name to make it unique

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/tambah_media');
        }

        $data = [
            'nama' => $nama,
            'gambar' => $gambar
        ];

        $this->Media_model->insert_media($data); // Insert sponsor via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin/media');
    }

    // Delete a sponsor
    public function hapus_media($id)
    {
        $this->Media_model->delete_media($id); // Delete sponsor via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/media');
    }

    // Load form to edit sponsor
    public function edit_media($id)
    {
        $data['title'] = "Edit media";
        $data['media'] = $this->Media_model->get_media_by_id($id); // Fetch data via the model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_media');
        $this->load->view('admin/footer');
    }

    // Handle updating sponsor
    public function update_media()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        
        // File upload configuration
        $config['upload_path']   = './assets/img/media/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 10000;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        $media_lama = $this->Media_model->get_media_by_id($id); // Get the old sponsor data
        
        if ($_FILES['gambar']['name']) {
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
                
                // Delete old image file if it exists
                if (file_exists(FCPATH . 'assets/img/media/' . $media_lama['gambar'])) {
                    unlink(FCPATH . 'assets/img/media/' . $media_lama['gambar']);
                }

                // Update with the new image
                $data = [
                    'nama' => $nama,
                    'gambar' => $gambar,
                ];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/edit_media/' . $id);
                return;
            }
        } else {
            // If no new image is uploaded, keep the old image
            $data = [
                'nama' => $nama,
                'gambar' => $media_lama['gambar'],
            ];
        }

        $this->Media_model->update_media($id, $data); // Update sponsor via model
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin/media');
    }

        public function kampus()
    {
        $data['title'] = "Kampus";
        $data['kampus'] = $this->Kampus_model->get_all_kampuss(); // Fetch data via the model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/kampus');
        $this->load->view('admin/footer');
    }

    // Load form to add a new sponsor
    public function tambah_kampus()
    {
        $data['title'] = "Tambah Kampus";

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tambah_kampus');
        $this->load->view('admin/footer');
    }

    // Handle submission of a new sponsor
    public function submit_kampus()
    {
        $nama = $this->input->post('nama');
        
        // File upload configuration
        $config['upload_path']   = './assets/img/kampus/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 10000;
        $config['encrypt_name']  = TRUE; // Encrypt file name to make it unique

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/tambah_kampus');
        }

        $data = [
            'nama' => $nama,
            'gambar' => $gambar
        ];

        $this->Kampus_model->insert_kampus($data); // Insert sponsor via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin/kampus');
    }

    // Delete a sponsor
    public function hapus_kampus($id)
    {
        $this->Kampus_model->delete_kampus($id); // Delete sponsor via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/kampus');
    }

    // Load form to edit sponsor
    public function edit_kampus($id)
    {
        $data['title'] = "Edit kampus";
        $data['kampus'] = $this->Kampus_model->get_kampus_by_id($id); // Fetch data via the model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_kampus');
        $this->load->view('admin/footer');
    }

    // Handle updating sponsor
    public function update_kampus()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        
        // File upload configuration
        $config['upload_path']   = './assets/img/kampus/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 10000;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        $kampus_lama = $this->Kampus_model->get_kampus_by_id($id); // Get the old sponsor data
        
        if ($_FILES['gambar']['name']) {
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
                
                // Delete old image file if it exists
                if (file_exists(FCPATH . 'assets/img/kampus/' . $kampus_lama['gambar'])) {
                    unlink(FCPATH . 'assets/img/kampus/' . $kampus_lama['gambar']);
                }

                // Update with the new image
                $data = [
                    'nama' => $nama,
                    'gambar' => $gambar,
                ];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/edit_kampus/' . $id);
                return;
            }
        } else {
            // If no new image is uploaded, keep the old image
            $data = [
                'nama' => $nama,
                'gambar' => $kampus_lama['gambar'],
            ];
        }

        $this->Kampus_model->update_kampus($id, $data); // Update sponsor via model
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin/kampus');
    }
    // Display all accounts
    public function akun()
    {
        $data['title'] = "Akun";
        $data['akun'] = $this->Akun_model->get_all_akun(); // Fetch data via model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/akun');
        $this->load->view('admin/footer');
    }

    // Delete an account
    public function hapus_akun($id)
    {
        $this->Akun_model->delete_akun($id); // Delete account via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/akun');
    }

    // Load form to add a new account
    public function tambah_akun()
    {
        $data['title'] = "Tambah Akun";

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tambah_akun');
        $this->load->view('admin/footer');
    }

    // Handle submission of a new account
    public function submit_akun()
    {
        $email = $this->input->post('email');
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $role_id = $this->input->post('role_id');

        // Check if email is already registered
        $cek = $this->Akun_model->check_email_exists($email);
        if ($cek > 0) {
            $this->session->set_flashdata('error', 'Email sudah terdaftar');
            redirect('admin/tambah_akun');
        }

        $data = [
            'email' => $email,
            'nama' => $nama,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'aktif' => 1,
            'role_id' => $role_id
        ];

        $this->Akun_model->insert_akun($data); // Insert account via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin/akun');
    }

    // Load form to edit an account
    public function edit_akun($id)
    {
        $data['title'] = "Edit Akun";
        $data['akun'] = $this->Akun_model->get_akun_by_id($id); // Fetch data via model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_akun');
        $this->load->view('admin/footer');
    }

    // Handle updating an account
    public function update_akun()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');

        $data = [
            'nama' => $nama,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $this->Akun_model->update_akun($id, $data); // Update account via model
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin/akun');
    }
    // Display pendaftaran data
    public function pendaftaran()
    {
        if ($this->session->userdata('email') == '') {
            redirect('auth');
        }

        $data['title'] = "Pendaftaran";
        $data['pendaftaran'] = $this->Pendaftaran_model->get_all_pendaftaran(); // Fetch data via model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/pendaftaran');
        $this->load->view('admin/footer');
    }
	public function ubahStatusPendaftaran()
    {
        $status = $this->input->post('status');
        $newStatus = $status == 1 ? 0 : 1;  // Toggle status
    
        $this->db->set('status', $newStatus);
        $this->db->where('id_aktifpendaftaran', 1); // Assuming there’s only one entry for registration status
        $this->db->update('tb_aktifpendaftaran'); 
    
        $this->session->set_flashdata('category_success', 'Status pendaftaran berhasil diubah.');
        redirect('admin/pendaftaran');
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
    redirect('admin/pendaftaran');
}

  
   // Display content data
    public function content()
    {
        $data['title'] = "Content";
        $data['content'] = $this->Content_model->get_all_content(); // Fetch data via model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/content');
        $this->load->view('admin/footer');
    }

    // Show add content form
    public function tambah_content()
    {
        $data['title'] = "Tambah Content";

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tambah_content');
        $this->load->view('admin/footer');
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
            redirect('admin/tambah_content');
            return;
        }

        $data = [
            'judul' => $judul,
            'gambar' => $gambar
        ];

        $this->Content_model->insert_content($data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin/content');
    }

    // Delete content
    public function hapus_content($id)
    {
        // Get current content data to check for existing gambar
        $gambar = $this->Content_model->get_content_by_id($id);
        unlink(FCPATH . 'assets/img/content/' . $gambar['gambar']);

        $this->Content_model->delete_content($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/content');
    }

    // Show edit content form
    public function edit_content($id)
    {
        $data['title'] = "Edit Content";
        $data['content'] = $this->Content_model->get_content_by_id($id);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_content');
        $this->load->view('admin/footer');
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
                redirect('admin/content/' . $id);
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
        redirect('admin/content');
    }

    //berkas
    public function berkas()
    {
        $data['title'] = "Berkas";
        $data['berkas'] = $this->Berkas_model->get_all_berkas(); // Fetch data via model
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/berkas');
        $this->load->view('admin/footer');
    }
    //Tambah Berkas
    public function tambah_berkas()
    {
        $data['title'] = "Tambah Berkas";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tambah_berkas');
        $this->load->view('admin/footer');
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
            redirect('admin/tambah_berkas');
        }

        $data = [
            'nama' => $nama,
            'file' => $berkas
        ];

        $this->Berkas_model->insert_berkas($data); // Insert via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin/berkas');
    }
    //hapus berkas
    public function hapus_berkas($id)
    {
        $berkas = $this->Berkas_model->get_berkas_by_id($id); // Get file data for deletion
        unlink(FCPATH . 'assets/berkas/' . $berkas['file']); // Delete file
        $this->Berkas_model->delete_berkas($id); // Delete record via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/berkas');
    }

    //edit berkas
    public function edit_berkas($id)
    {
        $data['title'] = "Edit Berkas";
        $data['berkas'] = $this->Berkas_model->get_berkas_by_id($id); // Fetch data via model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_berkas');
        $this->load->view('admin/footer');
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
                redirect('admin/edit_berkas/' . $id);
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
        redirect('admin/berkas');
    }
    //video sejarah
    public function video_sejarah()
    {
        $data['title'] = "Video Sejarah";
        $data['video_sejarah'] = $this->Video_sejarah_model->get_all_video_sejarah(); // Fetch data via model
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/video_sejarah');
        $this->load->view('admin/footer');
    }
    //tambah video sejarah
    public function tambah_video_sejarah()
    {
        $data['title'] = "Tambah Video Sejarah";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tambah_video_sejarah');
        $this->load->view('admin/footer');
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
        redirect('admin/video_sejarah');
    }
    //hapus video sejarah
    public function hapus_video_sejarah($id)
    {
        $this->Video_sejarah_model->delete_video_sejarah($id); // Delete via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/video_sejarah');
    }
    //edit video sejarah
    public function edit_video_sejarah($id)
    {
        $data['title'] = "Edit Video Sejarah";
        $data['video_sejarah'] = $this->Video_sejarah_model->get_video_sejarah_by_id($id); // Fetch data via model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_video_sejarah');
        $this->load->view('admin/footer');
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
        redirect('admin/video_sejarah');
    }
    //video testimoni

    public function video_testimoni()
    {
        $data['title'] = "Video testimoni";
        $data['video'] = $this->Video_testimoni_model->get_all_video_testimoni(); // Fetch data via model
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/video_testimoni');
        $this->load->view('admin/footer');
    }

    public function tambah_video_testimoni()
    {
        $data['title'] = "Tambah Video Testimoni";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tambah_video_testimoni');
        $this->load->view('admin/footer');
    }

    public function submit_video_testimoni()
    {
        $judul = $this->input->post('judul');
        $link = $this->input->post('link');
        $data = [
            'judul' => $judul,
            'link' => $link,
        ];

        $this->Video_testimoni_model->insert_video_testimoni($data); // Insert via model
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin/video_testimoni');
    }
   
    public function hapus_video_testimoni($id)
    {
        $this->Video_testimoni_model->delete_video_testimoni($id); // Delete via model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/video_testimoni');
    }

    public function edit_video_testimoni($id)
    {
        $data['title'] = "Edit Video Testimoni";
        $data['video'] = $this->Video_testimoni_model->get_video_testimoni_by_id($id); // Fetch data via model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_video_testimoni');
        $this->load->view('admin/footer');
    }
    //submit hasil edit video testimoni
    public function update_video_testimoni()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $link = $this->input->post('link');

        $data = [
            'judul' => $judul,
            'link' => $link,
        ];

        $this->Video_testimoni_model->update_video_testimoni($id, $data); // Update via model
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin/video_testimoni');
    }


    public function instagram()
    {
        $data['title'] = "Instagram";
        $data['instagram'] = $this->Instagram_model->get_all_instagram(); // Fetch from model
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/instagram');
        $this->load->view('admin/footer');
    }

    // Load the form to add a new video
    public function tambah_instagram()
    {
        $data['title'] = "Tambah Instagram";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/tambah_instagram');
        $this->load->view('admin/footer');
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
        redirect('admin/instagram');
    }

    // Delete a video
    public function hapus_instagram($id)
    {
        $this->Instagram_model->delete_instagram($id); // Delete via the model
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/instagram');
    }

    // Load the form to edit a instagram
    public function edit_instagram($id)
    {
        $data['title'] = "Edit Instagram";
        $data['instagram'] = $this->Instagram_model->get_instagram_by_id($id); // Fetch specific video via model

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_instagram');
        $this->load->view('admin/footer');
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
        redirect('admin/instagram');
    }
  

  
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
