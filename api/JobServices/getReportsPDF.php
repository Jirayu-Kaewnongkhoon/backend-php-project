<?php
    header("Access-Control-Allow-Origin: *");
    
    require_once('../../config/Database.php');
    include('../../models/JobRequest.php');
    include('../../helpers/createPDF.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate JobRequest Object
    $jobRequest = new JobRequest($db);

    // Get input data
    $month = $_GET['month'];
    $downloader_name = $_GET['user_name'];

    // Call function getReports()
    $result = $jobRequest->getReportsByMonth($month);

    $tableRows = "";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $tableRows .= "
            <tr>
                <td>". $job_description ."</td>
                <td>". $building ."</td>
                <td>". date_format(date_create_from_format("Y-m-d H:i:s", $pre_timestmp), "j M Y, H:i:s") ."</td>
                <td>". $job_status_name ."</td>
            </tr>
        ";

    }
    
    createPDF($tableRows, $month, $downloader_name);

?>