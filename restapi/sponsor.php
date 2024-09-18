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

// Query all jadwal sponsor
function get_sponsor()
{
    global $connect;
    $query = $connect->query("SELECT * FROM tb_sponsor");
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
