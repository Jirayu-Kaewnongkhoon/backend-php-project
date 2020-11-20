<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json");
    
    require_once('../../config/Database.php');
    include('../../models/JobRequest.php');
    include('../../helpers/readImage.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate JobRequest Object
    $jobRequest = new JobRequest($db);

    // Call function getReports()
    $result = $jobRequest->getReports();

    $response = array();
    $response['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $item = array(
            "job_id" => $job_id,
            "building" => $building,
            "floor" => $floor,
            "room" => $room,
            "description" => $job_description,
            "pre_timestmp" => $pre_timestmp,
            "pre_image_path" => readImage($pre_image_path),
            "requester_name" => $requester_name,
            "staff_name" => $staff_name,
            "post_timestmp" => $post_timestmp == null ? '' : $post_timestmp,
            "post_image_path" => $post_image_path == null ? '' : readImage($post_image_path),
            "job_status_name" => $job_status_name
        );

        array_push($response['data'], $item);
    }

    echo json_encode($response);

?>