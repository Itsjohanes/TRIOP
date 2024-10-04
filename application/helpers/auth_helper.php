<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('auths')) {
    function auths()
    {
        $CI = &get_instance();
        //role
        $role = $CI->session->userdata('role_id');

        // Periksa apakah ada sesi yang aktif
        if (!$CI->session->userdata('email')) {
            // Jika tidak ada sesi, arahkan pengguna ke halaman login
            redirect('auth/login');
        }

        // Jika ada sesi, periksa role pengguna dan arahkan ke halaman yang sesuai
        else {
            $current_url = $CI->uri->segment(1); // Mendapatkan segment URL saat ini

            if ($role == 1 && $current_url != 'admin') {
                // Jika role 1 (admin) dan bukan di halaman admin, redirect ke halaman admin
                redirect('admin');
            } else if ($role == 2 && $current_url != 'admin_humas') {
                // Jika role 2 (humas) dan bukan di halaman humas, redirect ke halaman humas
                redirect('admin_humas');
            } else if ($role == 3 && $current_url != 'admin_pendaftaran') {
                // Jika role 3 (pendaftaran) dan bukan di halaman pendaftaran, redirect ke halaman pendaftaran
                redirect('admin_pendaftaran');
            }
        }
    }
}
