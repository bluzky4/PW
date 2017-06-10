<?php

error_reporting(E_ALL);
ini_set('display_errors', 0);
require '../vendor/autoload.php';
require_once(dirname(__FILE__) . "/../connectDB/config.php");
require_once(dirname(__FILE__)."/../connectDB/db.php");

$app = new Slim\App(["settings" => $config]);
//Handle Dependencies
$container = $app->getContainer();

$container['db'] = function ($c) {
   
   try{
       $db = $c['settings']['db'];
       $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE                      => PDO::FETCH_ASSOC,
       );
       $pdo = new PDO("mysql:host=" . $db['servername'] . ";dbname=" . $db['dbname'],
       $db['username'], $db['password'],$options);
       return $pdo;
   }
   catch(\Exception $ex){
       return $ex->getMessage();
   }
   
};

/** Function for users:
    1. Add a new user
    2. Get all users
 * view all students
 * set profile and class for a student where user_id = ?

**/
$app->post('/user', function ($request, $response) {
   
   try{
       $con = $this->db;
       $sql = "INSERT INTO `user`(`username`,`password`,`first_name`, `last_name`,`email`,`phone`, `role_id`)"
               . " VALUES (:username,:password, :first_name, :last_name, :email, :phone, :role)";
       $pre  = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $values = array(
       ':username' => $request->getParam('username'),
       ':first_name' => $request->getParam('first_name'),
       ':last_name' => $request->getParam('last_name'),
       ':email' => $request->getParam('email'),
       ':phone' => $request->getParam('phone'),
//Using hash for password encryption
       ':password' => password_hash($request->getParam('password'),PASSWORD_DEFAULT),
        ':role' => $request->getParam('role')
       );
       $result = $pre->execute($values);
       header("Location: ../signin/admin.php");
       exit();
       
   }
   catch(\Exception $ex){
       return $response->withJson(array('error' => $ex->getMessage()),422);
   }
   
});

$app->get('/getAllStudents', function ($request,$response) {
   try{
       $con = $this->db;
       $sql = "SELECT * FROM `user` WHERE role_id = 3;";
       $result = null;
       foreach ($con->query($sql) as $row) {
           $result[] = $row['username']."  ".$row['first_name']."  ".$row['last_name']."  ".$row['email']."  ".$row['phone'];
       }
       if($result){
           return $response->withJson(array('status' => 'true','result'=>$result),200);
       }else{
           return $response->withJson(array('status' => 'Users Not Found'),422);
       }
              
   }
   catch(\Exception $ex){
       return $response->withJson(array('error' => $ex->getMessage()),422);
   }
   
});

$app->post('/setuserPC', function ($request,$response) {
   try{
       $con = $this->db;
       $sql = "INSERT INTO `student` (user_id, profile_id, class_id, admission_date) "
            . "VALUES (:user_id, :profile_id, :class_id, CURRENT_TIMESTAMP())";
       

   $pre  = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $values = array(
       ':profile_id' => $request->getParam('profile_id'),
       ':class_id' => $request->getParam('class_id'),
       ':user_id' => $request->getParam('user_id')
       );
       $result = $pre->execute($values);
       header("Location: try.php");
       exit();
       
   }
   catch(\Exception $ex){
       return $response->withJson(array('error' => $ex->getMessage()),422);
   }
});

/**
   Function for Classes: id, name
 * add a new class
 * get all classes
 * get class with name = ?
 * delete a class
 * 
 */

$app->post('/addClass', function ($request, $response) {
   
   try{
       $con = $this->db;
       $sql = "INSERT INTO `class`(`name`)"
               . " VALUES (:name)";
       $pre  = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $values = array(
       ':name' => $request->getParam('name')
       );
       $result = $pre->execute($values);
       header("Location: addClass.php");
       exit();
       
   }
   catch(\Exception $ex){
       return $response->withJson(array('error' => $ex->getMessage()),422);
   }
   
});


/**
   Function for Profil: id, name
 * add a new profil
 * get all profil
 * get profil with name = ?
 * delete a profil
 * 
 */

$app->post('/addProfile', function ($request, $response) {
   
   try{
       $con = $this->db;
       $sql = "INSERT INTO `profile`(`name`)"
               . " VALUES (:name)";
       $pre  = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $values = array(
       ':name' => $request->getParam('name')
       );
       $result = $pre->execute($values);
       header("Location: ../signin/admin.php");
       exit();
       
   }
   catch(\Exception $ex){
       return $response->withJson(array('error' => $ex->getMessage()),422);
   }
   
});

/**
 * Function for course
 * add a new course: name, year, semester, type, teacher as user_id
 */

$app->post('/addCourse', function ($request, $response) {
   
   try{
       $con = $this->db;
       $sql = "INSERT INTO `course`(`name`, `year`, `semester`, `type`, `user_id`)"
               . " VALUES (:name, :year, :semester, :type, :teacher)";
       $pre  = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $values = array(
        ':name' => $request->getParam('name'),
        ':year' => $request->getParam('year'),
        ':semester' => $request->getParam('semester'),
        ':type' => $request->getParam('type'),
        ':teacher' => $request->getParam('teacher_id')
       );
       $result = $pre->execute($values);
       header("Location: ../signin/admin.php");
       exit();
       
   }
   catch(\Exception $ex){
       return $response->withJson(array('error' => $ex->getMessage()),422);
   }
   
});

$app->delete('/:id', array($this, 'deleteItem'));
$app->run();


function getConnection() {
  $dbhost="localhost";
  $dbuser="root";
  $dbpass="x8Sw3AjBFcqBWCFm";
  $dbname="catalog";
  $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $dbh;
}

 function deleteItem($id) {
        try { 
           $sql = "delete from course where id=:id";
           $s = $this->dbh->prepare($sql);
           $s->bindParam("id", $id);
           $s->execute();
        } catch(\PDOException $e) {
            echo 'Exception: ' . $e->getMessage();
        }
    }





?>