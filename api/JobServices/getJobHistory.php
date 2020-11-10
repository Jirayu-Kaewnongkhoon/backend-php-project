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
    $user_id = $_GET['user_id'];

    // Call function getJobHistory()
    $result = $jobRequest->getJobHistory($user_id);

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
            "post_timestmp" => $post_timestmp == null ? '' : $post_timestmp,
            "post_image_path" => $post_image_path == null ? '' : readImage($post_image_path),
            "job_status_id" => $job_status_id,
            "job_status_name" => $job_status_name
        );

        array_push($response['data'], $item);
    }

    echo json_encode($response);

?>