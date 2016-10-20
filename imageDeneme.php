<?php
/**
 * Created by PhpStorm.
 * User: tunahansalih
 * Date: 23/05/16
 * Time: 21:48
 */

$databaseservername = "localhost";
$databaseusername   = "root";
$databasepassword   = "sorudatabase";
$databasename       = "androidApp";

$conn = new mysqli($databaseservername, $databaseusername, $databasepassword, $databasename);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$imgName = $_FILES['image']['name'];
$imgData = file_get_contents($_FILES['image']['tmp_name']);



$return = array();

//$return['imgData'] = $imgData;
$return['data'] = 'tusame';
$return['image'] = base64_encode($imgData);
echo 'asd'. json_encode($return). 'asd';
