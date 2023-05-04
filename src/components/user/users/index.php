<?php
require_once("../db/db_connection.php");
$page_name = "Users";
session_start();
$userId = $_SESSION['userId'];

$sql_users = "SELECT * FROM `users` WHERE `id` <> '$userId'";
$result_users = mysqli_query($conn,$sql_users);

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['UserDelId'])) {
      $userDelId = $_GET['UserDelId'];

      $sql_del_user  = "DELETE FROM users WHERE id = '$userDelId'";
      mysqli_query($conn,$sql_del_user);

      header("Location: ./");
    }
  }

echo '
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ScoreBoardPro</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/phosphor-icons"></script>
  <title>ScoreBoardPro</title>
    <link rel="icon" type="image/x-icon" href="../../../../public/images/ScoreBoardPro.png">

  <script src="../index.js" defer></script>
  <script src="index.js" defer></script>
  <script src="../view/index.js" defer></script>

  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../css/queries.css">
</head>
<body>
  <div class="container">
    ';
    //MAINNAV
    require_once("../view/main_nav.php");
    echo'
    <main>
      ';
      //NAVBAR
      require_once("../view/navbar.php");
      echo'
      <div class="user__info">
        <span>ID </span>
        <span>LOGIN </span>
        <span>E-MAIL</span>
        <span>ROLE</span>
        <span>SETTING</span>
      </div>

      <section class="users">
      ';
      if(mysqli_num_rows($result_users)>0) {
        while($row=mysqli_fetch_assoc($result_users)) {
          echo'
            <div class="user__card">
              <div class="user__id">
              ';
                echo $row['id'];
              echo '
              </div>
              <div class="user__login">
              ';
                echo $row['login'];
              echo '
              </div>
              <div class="user__mail">
              ';
                echo $row['email'];
              echo '
              </div>
              <div class="user__role">
              ';
                echo $row['role'];
              echo '
              </div>
              <div class="user__delete">
                <button value="
                ';
                echo $row['id'];
                echo'
                "class="deleteUser">Delete</button>
              </div>
            </div>      
          ';
        }
      }
      echo '
      </section>
    </main>
  </div>
  <div class="overlay hidden"></div>
  <div class="modal__confirm hidden">
    <button class="btn__close">&times;</button>
    <span>
      Do you confirm?
    </span>
    <button class="btn confirm_delete">&#10003; Confirm</button>
  </div>
</body>
</html>
';


require_once("../db/db_connection_close.php");
?>