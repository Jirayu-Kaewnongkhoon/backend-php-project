<?php
    header("Access-Control-Allow-Origin: *");
    
    require_once('../../config/Database.php');
    include('../../models/JobRequest.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate JobRequest Object
    $jobRequest = new JobRequest($db);

    // Get input data & set object properties
    $jobRequest->staff_id = $_POST['staff_id'];
    $jobRequest->job_id = $_POST['job_id'];

    $response = array();
    $response['data'] = array();

    // Create JobAssignment
    if ($jobRequest->createJobAssignment()) {

        $item = array(
            'message' => 'Job Assignment Created'
        );

        array_push($response['data'], $item);

        echo json_encode($response);

    } else {
        
        $item = array(
            'message' => 'Job Assignment Not Created'
        );

        array_push($response['data'], $item);
        
        echo json_encode($response);
    }

?>