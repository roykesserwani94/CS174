<?php  //Start the Session
session_start();
require('connection.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['email']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['email'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `users` WHERE email='$username' and password='$password'";

$result = mysqli_query($mysqli, $query) or die(mysql_error());
$count = mysqli_num_rows($result);

//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
  while ($row = mysqli_fetch_array($result)) {
    $_SESSION['id'] = $row[0]; //save user to session
    $profileQuery = mysqli_query($mysqli, "SELECT * FROM profile WHERE user_id = {$row[0]};");
      while ($row = mysqli_fetch_array($profileQuery)){
        $_SESSION['profile_id'] = $row[0];
      }
    }

$_SESSION['email'] = $username; //saves email IN SESSION

}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
echo "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['email'])){
$username = $_SESSION['email'];
header( 'Location: index.php' ) ;

}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
  header( 'Location: loginpage.php' ) ;

}
?>
