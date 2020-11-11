<?php
    header("Access-Control-Allow-Origin: *");
    
    require_once('../../config/Database.php');
    include('../../models/JobRequest.php');
    include('../../helpers/readImage.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate JobRequest Object
    $jobRequest = new JobRequest($db);

    // Get input data
    $job_id = $_GET['job_id'];

    // Call function getJobById()
    $result = $jobRequest->getJobById($job_id);

    $response = array();
    $response['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $item = array(
            "job_id" => $job_id,
            "requester_id" => $requester_id,
            "building" => $building,
            "floor" => $floor,
            "room" => $room,
            "description" => $job_description,
            "pre_timestmp" => $pre_timestmp,
            "pre_image_path" => readImage($pre_image_path),
            "job_status_name" => $job_status_name
        );

        array_push($response['data'], $item);
    }

    echo json_encode($response);

?>