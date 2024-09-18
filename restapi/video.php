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

// Query all video
function get_video()
{
    global $connect;
    $query = $connect->query("SELECT * FROM tb_video");
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

function getvideo_byid()
{
    global $connect;
    if (isset($_GET['id_youtube'])) {
        $id_youtube = $_GET['id_youtube'];
        $query = $connect->query("SELECT * FROM tb_video WHERE `id_youtube`='$id_youtube'");
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



?>
