<?php
    header("Access-Control-Allow-Origin: *");
    
    require_once('../../config/Database.php');
    include('../../models/JobRequest.php');
    include('../../helpers/uploadImagePath.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate JobRequest Object
    $jobRequest = new JobRequest($db);

    // Get input data & set object properties
    $jobRequest->job_status_id = $_POST['job_status_id'];
    if ($_FILES['post_image_path']['size'] != 0) {
        $jobRequest->post_image_path = uploadImagePath($_FILES['post_image_path']);
        $jobRequest->post_timestmp = date('Y-m-d H:i:s');
    }
    $jobRequest->job_id = $_POST['job_id'];

    $response = array();
    $response['data'] = array();

    // Update Job Status
    if ($jobRequest->updateJobStatus()) {

        $item = array(
            'message' => 'Job Status Updated'
        );

        array_push($response['data'], $item);

        echo json_encode($response);

    } else {
        
        $item = array(
            'message' => 'Job Status Not Updated'
        );

        array_push($response['data'], $item);
        
        echo json_encode($response);
    }

?>