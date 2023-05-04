<?php
  //DB CONNECTION
  require_once("../db/db_connection.php");
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

  session_start();
  $userId = $_SESSION['userId'];


  $sql = "SELECT ratings.id as rating_id, footballers.*, ratings.*
        FROM ratings 
        JOIN footballers 
        ON ratings.footballer_id = footballers.id 
        WHERE user_id = '$userId'";

  $result = mysqli_query($conn,$sql);

  $sql_user = "SELECT * FROM users WHERE id = '$userId'";
  $result_user = mysqli_query($conn,$sql_user);
  $row_user = mysqli_fetch_assoc($result_user);


  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
      $userImg = $_FILES['user__photo']['name']; 
      $tmp = $_FILES['user__photo']['tmp_name'];
      if($tmp) {
        $dest_folder = '../users/users_images/' . $userImg;
        move_uploaded_file($tmp,$dest_folder);
        $sql_userImg = "UPDATE `users` SET `img` = '$userImg' WHERE `users`.`id` = '$userId'";
        mysqli_query($conn,$sql_userImg);
        header("Location: ./");    
      }
    
      

      $soccer_rate = mysqli_real_escape_string($conn,$_POST['soccer_rate']);
      $soccer_playerId = mysqli_real_escape_string($conn, $_POST['submit_rate_playerId']);
    
      header("Location: ./");
      $sql= "UPDATE ratings SET rating = '$soccer_rate' WHERE ratings.id = '$soccer_playerId'";
      mysqli_query($conn,$sql);
    
  }


  $page_name = "Profile";

  
  echo '
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="../../../../public/images/ScoreBoardPro.png">
  <script src="https://unpkg.com/phosphor-icons"></script>
  <script src="../index.js" defer></script>
  <script src="index.js" defer></script>
  <script src="../view/index.js" defer></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/queries.css">
    <title>ScoreBoardPro</title>


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
      <section class="profile">
        <div class="profile__information">
          <div class="user__info">
            <form action="" method="POST" enctype="multipart/form-data" class="profile__form" >
              <div class="image__box">
              ';
              if($row_user['img']=='') {
                echo '
                  <i class="ph-user-fill user__default_icon"></i>
                ';
              } else {
                echo'
                <img src="../users/users_images/';
                echo $row_user['img'];
                echo'" alt="'; echo $row_user['img']; echo'" class="user__image"/>';
              }
              echo '
                <label for="inputTag" class="label__user">
                <span>Select Image</span><i class="ph ph-image-fill"></i>
                </label>
                <input id="inputTag" type="file" name="user__photo" required class="user"/>
              </div>
              <div class="info__box">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" disabled value="
                ';
                echo $row_user['email'];
                echo '">
                <label for="login">Login</label>
                <input type="text" name="login" id="login" disabled value="
                ';
                echo $row_user['login'];
                echo'">
                <button class="edit__profile">EDIT</button>
                </div>
            </form>
          </div>

          <div class="history__ratings">
            <p class="profile__heading"><span> History ratings</span> <i class="ph-caret-down show__history"></i></p>
            <div class="history__accordion accordion__hidden">
            ';
            if (mysqli_num_rows($result) > 0) { 
              $counter = 1;
              while($row = mysqli_fetch_assoc($result)) {
                 echo '
                  <div class="history__card">
                    <div class="position__footballer__info">
                      <div class="footballer__id">
                      ';
                      echo $counter;
                      echo '
                      </div>
                      <img src="../footballers_images/'.$row['img'].'
                      " alt="'; echo $row['img']; echo'" class="history__card__img">
                      <span class="footballer_name">
                      ';
                      echo $row['name'];
                      echo '
                      </span>
                    </div>
                    ';
			if(isset($_GET['editRating'])) {
                        $footballer_id = $_GET['editRating'];
			}
                        if(isset($_GET['editRating']) && $row['footballer_id']==$footballer_id) {
                            echo '
                            <form class="form__soccer_rate" action="./" method="POST">
                              <select name="soccer_rate" id="" class="rate">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                              <button class="rate__btn" type="submit" name="submit_rate_playerId" value="';
                                echo $row['rating_id'];
                                echo '
                                ">
                                Submit
                              </button>
                            </form>
                          ';
                        } else {
                          echo '
                            <div class="player__rating"><span>
                                ';
                                echo $row['rating'];
                                echo '
                              </span><i class="ph-star-fill soccer__icons"></i></div>
                              <form action="./" method="GET">
                                <button type="submit" name="editRating" value="
                                ';
                                  echo $row['footballer_id'];
                                  echo '" 
                                class="edit__rating">Edit Rating</button>
                              </form>
                          ';
                        }
		
                    echo'
                  </div>
                  ';
                  $counter++;
               }
            } else {
              echo "<span class='ratingError'>You have not rated any player</span>";
            }
            echo ' 
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</body>
</html>
  ';

  require_once("../db/db_connection_close.php");
?>  