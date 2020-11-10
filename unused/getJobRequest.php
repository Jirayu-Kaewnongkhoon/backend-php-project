<?php
    require_once('connection.php');
    include('readImage.php');

    $sql = "CALL getJobRequest();";

    $response = array();

    if ($result = mysqli_query($conn, $sql)) {

        while ($row = mysqli_fetch_assoc($result)) {

            $image = readImage($row["pre_image_path"]);

            array_push($response, array(
                "requester_id" => $row["requester_id"],
                "building" => $row["building"],
                "floor" => $row["floor"],
                "room" => $row["room"],
                "description" => $row["job_description"],
                "pre_timestmp" => $row["pre_timestmp"],
                "pre_image_path" => $image,
                "job_status_id" => $row["job_status_id"]
            ));
        }

        echo json_encode($response);
    }

?>