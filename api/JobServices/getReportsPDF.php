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

    // Call function getReports()
    $result = $jobRequest->getReportsByMonth($month);

    $tableRows = "";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $tableRows .= "
            <tr>
                <td>".$job_description."</td>
                <td>".$building."</td>
                <td>".$pre_timestmp."</td>
                <td>".$job_status_name."</td>
            </tr>
        ";

    }
    
    createPDF($tableRows);

?>