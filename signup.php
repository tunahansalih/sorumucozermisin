<?php
/**
 * Created by PhpStorm.
 * User: tunahansalih
 * Date: 22/05/16
 * Time: 23:08
 */

$databaseservername = "localhost";
$databaseusername   = "root";
$databasepassword   = "sorudatabase";
$databasename       = "androidApp";

$conn = new mysqli($databaseservername, $databaseusername, $databasepassword, $databasename);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}



$username   = $_POST["username"];
$password   = $_POST["password"];
$name       = $_POST["name"];


$return = array();

if($username != '' && $password != '' && $name != '') {
    $sql = "INSERT INTO users (iduser,username, password, name) VALUES ('null','" . $username . "','" . $password . "','" . $name . "')";
    $result = mysqli_query($conn, $sql);
}
if($result){
    $return["result"] = "success";
}else{
    $return["result"] = "fail";
}

echo json_encode($return);

mysqli_close($conn);

?>
