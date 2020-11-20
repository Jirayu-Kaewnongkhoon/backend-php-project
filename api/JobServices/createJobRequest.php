<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json");
    
    require_once('../../config/Database.php');
    include('../../models/JobRequest.php');
    include('../../helpers/uploadImagePath.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate JobRequest Object
    $jobRequest = new JobRequest($db);

    // Get input data & set object properties
    $jobRequest->requester_id = $_POST['requester_id'];
    $jobRequest->building = $_POST['building'];
    $jobRequest->floor = $_POST['floor'];
    $jobRequest->room = $_POST['room'];
    $jobRequest->description = $_POST['description'];
    $jobRequest->pre_timestmp = date('Y-m-d H:i:s');
    $jobRequest->pre_image_path = uploadImagePath($_FILES['pre_image_path']);
    /* Old Solution */
    // $jobRequest->pre_image_path = uploadImagePath($_POST['pre_image_path']);

    $response = array();
    $response['data'] = array();

    // Create JobRequest
    if ($jobRequest->createJobRequest()) {

        $item = array(
            'message' => 'Job Request Created'
        );

        array_push($response['data'], $item);

        echo json_encode($response);

    } else {
        
        $item = array(
            'message' => 'Job Request Not Created'
        );

        array_push($response['data'], $item);
        
        echo json_encode($response);
    }

?>