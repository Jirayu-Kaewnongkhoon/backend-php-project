<?php
    require_once('connection.php');
    include('uploadImagePath.php');

    $requester_id = $_POST['requester_id'];
    $building = $_POST['building'];
    $floor = $_POST['floor'];
    $room = $_POST['room'];
    $description = $_POST['description'];
    $pre_timestmp = date('Y-m-d H-i-s');
    $pre_image_path = $_POST['pre_image_path'];

    $path = uploadImagePath($pre_image_path);

    $sql = "CALL saveJobRequest(
        '$requester_id', 
        '$building', 
        '$floor', 
        '$room', 
        '$description',
        '$pre_timestmp',
        '$path'
    );";

    $response = array();

    if ($result = mysqli_query($conn, $sql)) {
        
        echo json_encode($response);
    }

?>