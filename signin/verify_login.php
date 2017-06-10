<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once(dirname(__FILE__) . "../../db_model/Role.php");
require_once(dirname(__FILE__) . "../../db_model/User.php");

$objUser = new User();
$objRole = new Role();

$message="";
if(count($_POST)>0) {
$conn = mysqli_connect("localhost","root","x8Sw3AjBFcqBWCFm");
mysqli_select_db($conn, "catalog");

$result = mysqli_query($conn,"SELECT * FROM user WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["id"] = $row[id];
$_SESSION["username"] = $row[username];
$_SESSION["role"] = $objRole->getRole($_POST['username']);
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["id"])) {
    
    if ($objUser->usersAvailable()){
    
    if ($objRole->getRole($_POST['username']) == 1 || $objRole->getRole($_POST['username']) == 2){
        $_SESSION['login_user'] = $userName;
        header("Location: ../web/forms/index.html"); 
        exit();
    }
    
    else  if ( $objRole->getRole($_POST['username']) == 3){
        $_SESSION['login_user'] = $userName;
        header("Location: ../web/forms/student.html"); 
        exit();
    }
    
    
    
}
}
?>

