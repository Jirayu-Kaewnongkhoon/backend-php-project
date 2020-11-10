<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/pdf");
    
    require_once('../../config/Database.php');
    include('../../models/JobRequest.php');
    include('../../helpers/createPDF.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate JobRequest Object
    $jobRequest = new JobRequest($db);

    // Call function getReports()
    $result = $jobRequest->getReports();

    $tableRows = "";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $tableRows .= "
            <tr>
                <td>".$job_description."</td>
                <td>".$building."</td>
                <td>".$pre_timestmp."</td>
            </tr>
        ";

    }
    
    createPDF($tableRows);

?>