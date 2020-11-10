<?php
    header('Access-Control-Allow-Origin: *');
    
    require_once('../../config/Database.php');
    include('../../models/User.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate User Object
    $user = new User($db);

    // Get input data & set object properties
    $user->user_name = $_POST['user_name'];
    $user->password = $_POST['password'];

    // Call function getUser()
    $result = $user->getUser();

    $response = array();
    $response['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $item = array(
            "user_id" => $user_id,
            "user_name" => $user_name,
            "role_name" => $role_name
        );

        array_push($response['data'], $item);
    }

    echo json_encode($response);

?>