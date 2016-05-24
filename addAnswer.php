<?php
/**
 * Created by PhpStorm.
 * User: tunahansalih
 * Date: 23/05/16
 * Time: 12:04
 */

$databaseservername = "localhost";
$databaseusername   = "root";
$databasepassword   = "123";
$databasename       = "androidApp";

$conn = new mysqli($databaseservername, $databaseusername, $databasepassword, $databasename);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$idquestion = $_POST["idquestion"];
$username   = $_POST["username"];
$answer     = $_POST["answer"] ? $_POST["answer"] : 'null';
$photo      = $_POST["photo"] ? $_POST["photo"] : 'null';
$dateanswer = getDatetimeNow();

$return = array();

$sqlusername = "SELECT * FROM users WHERE username='".$username."'";

$userresult = mysqli_query($conn, $sqlusername);

if(mysqli_num_rows($userresult) > 0){
    $rowuser = mysqli_fetch_assoc($userresult);
    $iduser = $rowuser['iduser'];

    $sql = "INSERT INTO answer(idanswer, iduser, idquestion, answer, dateanswer, photo)
            VALUES ('null', '".$iduser."','".$idquestion."','".$answer."','".$dateanswer."','".$photo."')";
    
    $result = mysqli_query($conn, $sql);
    if($result){
        $return["result"] = "success";
    }else{
        $return["result"] = "fail";
    }
}else{
    $return["result"] = "fail";
}




echo json_encode($return);



mysqli_close($conn);

function getDatetimeNow() {
    $tz_object = new DateTimeZone('Europe/Istanbul');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ H:i:s');
}
