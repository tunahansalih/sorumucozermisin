<?php
/**
 * Created by PhpStorm.
 * User: tunahansalih
 * Date: 23/05/16
 * Time: 00:27
 */

$databaseservername = "localhost";
$databaseusername   = "root";
$databasepassword   = "sorudatabase";
$databasename       = "androidApp";

$conn = new mysqli($databaseservername, $databaseusername, $databasepassword, $databasename);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'] ? $_POST['username'] : 'null';
$title = $_POST['title'] ? $_POST['title'] : 'null';
$question = $_POST['question'] ? $_POST['question'] : 'null';
$date = getDatetimeNow();
$photo = $_POST['photo'] ? $_POST['photo'] : 'null';


$return = array();

$sqlusername = "SELECT * FROM users WHERE username='".$username."'";

$userresult = mysqli_query($conn, $sqlusername);

if(mysqli_num_rows($userresult) > 0){
    $rowuser = mysqli_fetch_assoc($userresult);
    $iduser = $rowuser['iduser'];

    $sql = "INSERT INTO questions(idquestion, iduser, title, question,datequestion, photo)
            VALUES ('null', '".$iduser."','".$title."','".$question."','".$date."','".$photo."')";
    
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
