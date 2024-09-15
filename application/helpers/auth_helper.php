<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('auths')) {
    function auths()
    {
        $CI = &get_instance();

        // Periksa apakah ada sesi yang aktif
        if (!$CI->session->userdata('email')) {
            // Jika tidak ada sesi, arahkan pengguna ke halaman login
            redirect('auth/login');
        }

        
       

    }
}
