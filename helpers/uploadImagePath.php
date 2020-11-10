<?php

    function uploadImagePath($image) {
        // Set directory
        $target_dir = "upload/";

        // Get Info
        $type = pathinfo($image['name'], PATHINFO_EXTENSION);

        // Set path
        $imagePath = $target_dir.time().".".$type;

        // Upload to directory
        move_uploaded_file($image['tmp_name'], "../../".$imagePath);
        
        return $imagePath;
    }

    /* Old Solution */
    // function uploadImagePath($image) {
    //     // Set directory
    //     $target_dir = "upload/";

    //     // Set path
    //     $imagePath = $target_dir.time();
        
    //     // Create file with path
    //     $myfile = fopen("../../".$imagePath.".txt", "w");
        
    //     // Write image to text
    //     fwrite($myfile, $image);

    //     // Close file
    //     fclose($myfile);
        
    //     return $imagePath;
    // }

?>