<?php
session_start();
require 'connection.php';
$errors = array();
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $query = "SELECT * FROM `users` WHERE email='$email'";
  $result = mysqli_query($mysqli, $query);
  if (mysqli_num_rows($result) > 0){ echo "user already exists"; }
  else{
    $query = "INSERT INTO users VALUES (NULL, '$name', '$email', '$password', NULL, NULL, NULL)";
    $result = mysqli_query($mysqli, $query) or die(mysql_error());
    if ($result){
      $lastIdInserted = mysqli_insert_id($mysqli);
      $createProfileQuery = "INSERT INTO profile VALUES (NULL, $lastIdInserted, 0)";
      $profileQuery = mysqli_query($mysqli, $createProfileQuery) or die(mysql_error());
      if ($profileQuery){
        $_SESSION['email'] = $email;
        header( 'Location: index.php' ) ;
      }
    }
  }
}

 ?>
