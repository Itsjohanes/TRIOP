<?php 
require_once "dbconn/dbconn.php";

if (isset($_GET['function']) && function_exists($_GET['function'])) {
    $_GET['function']();
} else {
    $response = array(
        'status' => 0,
        'message' => 'Function not specified or does not exist'
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Query all jadwal data
function get_jadwal()
{
    global $connect;
    //Joinkan dengan tb_sekolah ambil namanya where id_sekolah1  = id_sekolah dan id_sekolah2 = id_sekolah
        $query = $connect->query("
            SELECT tb_jadwal.*, 
                s1.nama AS sekolah1, 
                s1.gambar AS gambar1,
                s2.nama AS sekolah2,
                s2.gambar AS gambar2
            FROM tb_jadwal
            LEFT JOIN tb_sekolah s1 ON tb_jadwal.id_sekolah1 = s1.id_sekolah
            LEFT JOIN tb_sekolah s2 ON tb_jadwal.id_sekolah2 = s2.id_sekolah
            ORDER BY tb_jadwal.tanggal ASC
        ");
    $data = array();
    while ($row = mysqli_fetch_object($query)) {
        $data[] = $row;
    }
    $response = array(
        'status' => 1,
        'message' => 'success',
        'data' => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}


?>
