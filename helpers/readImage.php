<?php

    function readImage($path) {
        // Get Info
        $type = pathinfo("../../".$path, PATHINFO_EXTENSION);
        
        // Read file
        $image = file_get_contents("../../".$path);

        // Get Base64 from image
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($image);

        return $base64;
    }

    /* Old Solution */
    // function readImage($path) {
    //     // Open file
    //     $imageFile = fopen("../../".$path.".txt", "r") or die("Unable to open file!");
        
    //     // Read file
    //     $image = fread($imageFile, filesize("../../".$path.".txt"));
        
    //     // Close file
    //     fclose($imageFile);

    //     return $image;
    // }

?>