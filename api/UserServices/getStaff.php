<?php
    header('Access-Control-Allow-Origin: *');
    header("Content-type: application/json");
    
    require_once('../../config/Database.php');
    include('../../models/User.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate User Object
    $user = new User($db);

    // Get input data
    $user_id = $_GET['user_id'];

    // Call function getStaff()
    $result = $user->getStaff($user_id);

    $response = array();
    $response['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $item = array(
            "user_id" => $user_id,
            "user_name" => $user_name,
            "role_id" => $role_id
        );

        array_push($response['data'], $item);
    }

    echo json_encode($response);

?>