<?php
/**
 * Created by PhpStorm.
 * User: tunahansalih
 * Date: 23/05/16
 * Time: 11:46
 */

$databaseservername = "localhost";
$databaseusername   = "root";
$databasepassword   = "sorudatabase";
$databasename       = "androidApp";

$conn = new mysqli($databaseservername, $databaseusername, $databasepassword, $databasename);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$idquestion = $_POST["idquestion"];

$return = array();

$sql = "SELECT answer.idanswer, users.username, users.name, answer.answer, answer.photo, answer.dateanswer
        FROM answer, users
        WHERE answer.idquestion='".$idquestion."' AND users.iduser=answer.iduser
        ORDER BY answer.dateanswer DESC";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    array_push($return, $row);
}



echo json_encode($return);



mysqli_close($conn);
