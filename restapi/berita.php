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

// Query all berita data
function get_berita()
{
    global $connect;
    $query = $connect->query("SELECT * FROM tb_berita");
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

// Query berita by ID
function getberita_byid()
{
    global $connect;
    if (isset($_GET['id_berita'])) {
        $id_berita = $_GET['id_berita'];
        $query = $connect->query("SELECT * FROM tb_berita WHERE `id_berita`='$id_berita'");
        $data = array();
        while ($row = mysqli_fetch_object($query)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => 'success',
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'id_berita not provided'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
