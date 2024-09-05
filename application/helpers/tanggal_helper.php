<?php
function tanggal_indonesia($datetime) {
    // Array hari dan bulan dalam bahasa Indonesia
    $hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

    // Ubah datetime ke timestamp
    $timestamp = strtotime($datetime);

    // Ambil hari, tanggal, bulan, dan tahun
    $nama_hari = $hari[date('w', $timestamp)];
    $tanggal = date('j', $timestamp);
    $bulan_indonesia = $bulan[date('n', $timestamp)];
    $tahun = date('Y', $timestamp);

    // Format waktu
    $jam = date('H:i', $timestamp);

    // Gabungkan format
    return $nama_hari . ', ' . $tanggal . ' ' . $bulan_indonesia . ' ' . $tahun . ' - ' . $jam;
}
