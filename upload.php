<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);



$response = array();



if (isset($_FILES['file'])) {

    $uploadDir = "uploads/";



    if (!file_exists($uploadDir)) {

        mkdir($uploadDir, 0755, true);

    }



    $fileName = basename($_FILES["file"]["name"]);

    $uploadFile = $uploadDir . $fileName;



    if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) {

        $response["status"] = "success";

        $response["url"] = "https://your_domain/uploads/" . $fileName;

    } else {

        $response["status"] = "fail";

        $response["message"] = "Failed to move uploaded file.";

    }

} else {

    $response["status"] = "fail";

    $response["message"] = "No file uploaded.";

}



header('Content-Type: application/json');

echo json_encode($response);

?
