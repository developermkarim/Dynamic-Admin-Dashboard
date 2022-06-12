<?php
session_start();
require_once 'includes/Database.php';
$dbobj = new Database;
$dbcon = $dbobj->DB_Connect();
 if (isset($_POST['sign-btn'])){
   $userName = $_POST['userName'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $con_password = $_POST['Con-password'];
//    $error = [];
   if (empty($userName) || empty($email) || empty($password) ||($password != $con_password)){
    
      $_SESSION['error'] = "all field must be inserted";
      return false;
    

   } else {
    $dbquery = $dbcon->query("INSERT INTO admin_panel_job_project(Username,Email,Password) VALUES('$userName','$email','$password')");
    $_SESSION['success'] = "data is inserted";
    header('location:register.php');
   
   }
   $dbquery = null;
   
  }
    
 
?>
