<?php
require_once(dirname(__FILE__)."/../connectDB/db.php");

//$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

function getRole($username){
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT role_id FROM user where username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            return $row['role_id'];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}

function getAllTeachers(){
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT *, CONCAT(CONCAT(`user`.`first_name`,' '), `user`.`last_name`) as 'name',"
                . "`user`.`email` as `email`, `user`.`phone` as `phone` "
                . " FROM `user` where role_id = 2";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        else{
           return array();
        }
    $conn->close();
}


function getAllCourses(){
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM `course`";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        else{
           return array();
        }
    $conn->close();
}

function getTeacher($id){
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT CONCAT(CONCAT(`user`.`first_name`,' '), `user`.`last_name`) as 'name' FROM `user` where id = '$id'";
    $result = $conn->query($sql);

    while($rs = mysqli_fetch_array($result)) {
            $row = $rs['name'];
              return $row;
        }
    $conn->close();
}
