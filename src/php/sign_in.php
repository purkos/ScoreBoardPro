<?php
$servername = "localhost";
$username = "jakub.piorkowski";
$password = "mySaiCQsql";
$dbname = "jakub.piorkowski";
// First, establish a connection to the database (using the code from my previous answer)
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Next, retrieve the login and password from the form submission
$login = mysqli_real_escape_string($conn, $_POST['login']);
$password = mysqli_real_escape_string($conn, $_POST['password']);



// Use the login and password to query the database for the user's information
$sql = "SELECT * FROM users WHERE login = '$login'";
$result = mysqli_query($conn, $sql);

// // Check if there is exactly one row in the result (indicating a successful login)
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

  // Fetch the user's information from the row
  if(password_verify($password,$row['password'])) {
    //LOGGED
    $userId = $row['id'];

    session_start();

    $_SESSION['userId'] = $userId;


      header("Location: ../components/user/index.php");
  } else {
      header("Location: ../../public/index.html?Error=Incorrect username or password");
  }


  
  // ... etc. (replace with the actual columns from your "users" table)

  // Do something with the user's information (e.g. store it in a session variable)
  // $_SESSION['user'] = array(
  //   'name' => $name,
  //   'email' => $email,
  //   // ... etc.
  // );
  // Redirect the user to another page (e.g. the dashboard)
  exit();
} else {
  // Display an error message to the user (e.g. "Incorrect username or password")
  header("Location: ../../public/index.html?Error=Incorrect username or password");
}
?>
