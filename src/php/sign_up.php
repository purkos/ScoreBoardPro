<?php
$servername = 'localhost';
$username = 'jakub.piorkowski';
$password = 'mySaiCQsql';
$dbname = 'jakub.piorkowski';

// First, establish a connection to the database (using the code from my previous answer)

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Retrieve the form data
  $email = $_POST['email'];
  $login = $_POST['login'];
  $password = $_POST['password'];
  $repeatpasswd = $_POST['repeatpasswd'];

  $sql = "SELECT * FROM users WHERE email='$email' OR login='$login'";
  $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // The user already exists, show an error message
  header("Location: ../../public/index.html?SignUp=User already exists");
  // exit();
} else {
  // The user does not exist, insert them into the database
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $sql_user = "INSERT INTO users (email, login, password,role,img) VALUES ('$email', '$login', '$hashed_password','User','')";
  mysqli_query($conn, $sql_user);

  
  $row = mysqli_fetch_assoc($result);
  $userId = $row['id'];
  session_start();
  $_SESSION['userId'] = $userId;


  // Redirect to the login page
  header("Location: /~jakub.piorkowski/project/public/index.html?SignUp=Succesfully registered");
  exit();
}

  }
?>
