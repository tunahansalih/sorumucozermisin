<?php
/**
 * Created by PhpStorm.
 * User: tunahansalih
 * Date: 23/05/16
 * Time: 00:15
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

$return = array();

$sql = "SELECT *
        FROM users
        WHERE username='".$username."' AND password='".$password."'";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $return["result"] = "success";
    $return["name"] = $row["name"];

}else{
    $return["result"] = "fail";
}

echo json_encode($return);

mysqli_close($conn);
?>
