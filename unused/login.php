<?php
    require_once('connection.php');

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $sql = "CALL login('$user_name', '$password');";
    $response = array();

    if ($result = mysqli_query($conn, $sql)) {

        while ($row = mysqli_fetch_assoc($result)) {

            array_push($response, array(
                "user_id" => $row["user_id"],
                "user_name" => $row["user_name"],
                "role_name" => $row["role_name"]
            ));
        }
        
        echo json_encode($response);
    }
?>