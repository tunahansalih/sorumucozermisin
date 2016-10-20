<?php
/**
 * Created by PhpStorm.
 * User: tunahansalih
 * Date: 23/05/16
 * Time: 00:29
 */

$databaseservername = "localhost";
$databaseusername   = "root";
$databasepassword   = "sorudatabase";
$databasename       = "androidApp";

$conn = new mysqli($databaseservername, $databaseusername, $databasepassword, $databasename);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT questions.idquestion, users.username, users.name, questions.title, questions.question, questions.datequestion, questions.photo
        FROM users, questions
        WHERE questions.iduser=users.iduser
        ORDER BY questions.datequestion DESC";

$return = array();
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    array_push($return, $row);
}


echo json_encode($return);

mysqli_close($conn);
