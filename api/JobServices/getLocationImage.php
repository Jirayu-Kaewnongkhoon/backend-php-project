<?php
    header("Access-Control-Allow-Origin: *");
        
    include('../../helpers/readImage.php');

    $response = array();
    $response['data'] = array();

    $item = array(
        'locationImage' => readImage('constant/map.png')
    );

    array_push($response['data'], $item);

    echo json_encode($response);

?>