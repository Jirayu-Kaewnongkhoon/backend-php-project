<?php
    // require_once('connection.php');

    // INSERT DATA
    // $sql = "INSERT INTO members (name, age)
    // VALUES ('Jane', '19')";
    
    // if ($conn->query($sql) === TRUE) {
    //   echo "New record created successfully";
    // } else {
    //   echo "Error: " . $sql . "<br>" . $conn->error;
    // }
    
    
    // SELECT DATA
    $sql = "SELECT * FROM user";
    $user = array();
    
    if ($result = mysqli_query($conn, $sql)) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $user[$i] = array(
                "id" => $row["user_id"],
                "name" => $row["user_name"],
                "role" => $row["role_id"]
            );
            $i++;
        }
        echo json_encode($user);
    }
?>