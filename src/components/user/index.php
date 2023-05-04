<?php
  //database connection
  require_once("db/db_connection.php");
  

  session_start();
  $userId = $_SESSION['userId'];

  $sql_footballers = "SELECT * FROM footballers";
  $result_footballers = mysqli_query($conn, $sql_footballers);

  $sql_user = "SELECT * FROM users WHERE id = '$userId'";
  $result_user = mysqli_query($conn,$sql_user);
  $row_user = mysqli_fetch_assoc($result_user);
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['DelId'])) {
      $delId = $_GET['DelId'];
      $sql_del = "DELETE FROM footballers WHERE id='$delId'";
      mysqli_query($conn,$sql_del);

      header("Location: ./");
    } 
   }
if(isset($_POST['EditFootb'])) {

    $name = $_POST['name'];
    $club = $_POST['club'];
    $dateOfBirth = $_POST['age'];
    $formattedDateOfBirth = str_replace('.', '-', $dateOfBirth);
    $nationality = $_POST['nationality'];
    $league = $_POST['league'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $number = $_POST['number'];
    $position = $_POST['position'];
    $footballer_id = $_POST['EditFootb'];
     
        

    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $footballerImg = $_FILES['img']['name'];
    $file_extension = strtolower(pathinfo($footballerImg, PATHINFO_EXTENSION));
    
    $name_with_underscore = str_replace(" ", "_", $name);
    $footballerImgNew = $name_with_underscore . "." . $file_extension;

    $old_file = "./footballers_images/". $footballerImgNew;
    unlink($old_file);
    
    $tmp = $_FILES['img']['tmp_name'];
    $dest_folder = './footballers_images/' . $footballerImgNew;
    move_uploaded_file($tmp,$dest_folder);

    $sqlEditFootb = "UPDATE footballers SET name='$name', nationality='$nationality', club='$club', league='$league', height='$height', weight='$weight', number = '$number', position='$position', age='$formattedDateOfBirth', img ='$footballerImgNew' WHERE id='$footballer_id'";

mysqli_query($conn,$sqlEditFootb);
header("Location: ./");
    

  }
 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $soccer_rate = mysqli_real_escape_string($conn,$_POST['soccer_rate']);
    $soccer_playerId = mysqli_real_escape_string($conn, $_POST['submit_rate_playerId']);


    $sql_already_exists_rating = "SELECT * FROM ratings WHERE footballer_id = '$soccer_playerId' AND user_id = '$userId'";
    $result_already_exists_rating = mysqli_query($conn, $sql_already_exists_rating);

    if(mysqli_num_rows($result_already_exists_rating)>0) {
      //
      header('Location: ./index.php?RatingsError=You can only give one rating to each player');
    } else {
      $sql_ratings = "INSERT INTO ratings (footballer_id,user_id,rating) VALUES('$soccer_playerId','$userId','$soccer_rate')";
      mysqli_query($conn, $sql_ratings);
      header('Location: ./');
    }
  }

  $page_name = "Footballers";

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
  <script src="index.js" defer></script>
  <script src="addFootballer/index.js" defer></script>
<link rel="stylesheet" href="addFootballer/style.css">  
<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/queries.css"> 
  
  <link rel="icon" type="image/x-icon" href="../../../public/images/ScoreBoardPro.png">
  

  <title>ScoreBoardPro</title>



</head>
<body>
  <div class="container">
    ';
    
    echo'
<header class="header">
      <nav class="main__nav">
        <ul class="nav__list">
          <a href="./" class="nav__item">
            <li><i class="ph-users-three-fill nav-icon"></i> Footballers</li>
          </a>
          <a href="ranking" class="nav__item">
            <li><i class="ph-trophy-fill nav-icon"></i> Ranking</li>
          </a>
        </ul>
        <ul class="user__list">
          <a href="profile" class="nav__item">
            <li><i class="ph-user-fill nav-icon"></i>Profile</li>
          </a>
          ';
          if($row_user['role']=='Admin') {
            echo '
              <a href="users" class="nav__item">
                <li><i class="ph-users-fill nav-icon"></i>Users</li>
              </a>
              <a href="addFootballer" class="nav__item">
                <li><i class="ph-users-fill nav-icon"></i>Add footballer</li>
              </a>
            ';
          } else {

          }
          echo '
          <a href="../../php/logout.php" class="nav__item">
            <li><i class="ph-sign-out-fill nav-icon"></i> Log out</li>
            </a>
            </ul>
        </nav>
      <button class="menu open-menu"><i class="ph-fill ph-list"></i></button>
    </header>
    <main>
      ';
      //NAVBAR
      echo '
  	<section class="navbar">
        <div class="page__title">
        ';
        echo $page_name;
        echo'
        </div>

        <a href="profile/" class="user__profile_link"><div class="user__profile__logo">
          <div class="user__profile__img">';
          if($row_user['img']=='') {
            echo '
              <i class="ph-user-fill user__profile__img_icon"></i>
            ';
          } else {
            echo '
            <img src="users/users_images/';
              echo $row_user['img'];
              echo'" alt="user image" class="profile__icon"/>
            ';
          }
          echo '
          </div>
          <div class="user__profile__info">
            <div class="user__profile__name">
            ';
            echo $row_user['login'];
            echo '
            </div>
            <div class="user__profile__role">
            ';
            echo $row_user['role'];
            echo '
            </div>
          </div>
        </div>
        </a>
      </section>
      <sections class="soccers__cards">
      ';
      
      //GENERATE PLAYERS FROM DATABASE
      if (mysqli_num_rows($result_footballers) > 0) {
      // Output data of each footballer
        while($row_footballers = mysqli_fetch_assoc($result_footballers)) {
          $footballer_id = $row_footballers['id'];
          $footballer_name = $row_footballers['name'];
          $footballer_club = $row_footballers['club'];
          $footballer_age = $row_footballers['age'];
          $footballer_img = $row_footballers['img'];
          $age = date_diff(date_create($footballer_age), date_create('now'))->y;
                echo '
        <div class="soccer__card">
        ';
          if($row_user['role']=="Admin") {
            echo '
              <a href="./?DelId=';
              echo $footballer_id;
              echo'" class="delete__user"><span>&times;</span></a>
	      <a href="./index.php?Edit=';
		echo $footballer_id;
		echo'" class="edit__user"><i class="ph-fill ph-pencil"></i></a>
            ';
          }
        echo '
        ';
	  echo '<a href="./footballer/?footballerId='; echo $footballer_id; echo '">';
          echo '<img src="footballers_images/' . $footballer_img. '" class="soccer__img" alt="'.$footballer_img .'">';
        echo '</a>';
        echo '
          <div class="soccer__info">
            <div class="soccer__name__surname">
              <div class="soccer__info_item"><i class="ph-identification-badge-fill soccer__icon"></i><span>
              ';
              echo $footballer_name;
              echo'
              </span>
              </div>            </div>
            <div class="soccer__info_item"><i class="ph-cake-fill soccer__icon"></i><span>
            ';
              echo $age;
              echo'
            years old</span></div>
            <div class="soccer__info_item"><i class="ph-shield-fill soccer__icon"></i><span>
            ';
              echo $footballer_club;
              echo'
            </span></div>
            
            <div class="soccer__rate">
            <div class="soccer__info_item"><i class="ph-star-fill soccer__icon"></i><span>Rate</span></div>
            <form class="form__soccer_rate" action="" method="POST">
		
              <select name="soccer_rate" id="" class="rate">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              </select>
              <button class="rate__btn" type="submit" name="submit_rate_playerId" value="';
              echo $footballer_id;
              echo '
              ">
              Submit
              </button>
              </form>

            </div>
            <a href="./footballer/?footballerId=
            ';
            echo $footballer_id;
            echo '" class="profile__view" > <div class="soccer__info_item"><i class="ph-info-fill soccer__icon"></i><span>
              View profile
            </span></div>
            </a>
          </div>
        </div>
        ';
        }
      }
      echo '
      </sections>
      <div class="ratings__error hidden">
      <span>
        You can only give one rating to each player
      </span>
      <button class="btn__close_error">&times;</button>
      </div>

      <div class="edit__footballer hidden"> 
       <form class="edit__footballer_form form__login " method="POST" action="./" enctype="multipart/form-data">
	  ';
	$EditId = $_GET['Edit'];
	$sql_edit = "SELECT * FROM footballers WHERE id='$EditId'";
	$result_edit = mysqli_query($conn,$sql_edit);
 	  while($row_edit = mysqli_fetch_assoc($result_edit)) {
	echo'
		<label for="name">Name</label>
          <input type="text" name="name" id="name" required value="
';
echo $row_edit['name'];
echo'"/>
          <label for="club">Club </label>
          <input type="text" name="club" id="club" required value="
';
echo $row_edit['club'];
echo'"/>
          <label for="nationality">Nationality</label>
          <input type="text" name="nationality" id="nationality" required value="
';
echo $row_edit['nationality'];
echo'"/>
          <label for="league">League</label>
          <input type="text" name="league" id="league" required value="
';
echo $row_edit['league'];
echo'"/>
          <label for="height">Height
          </label>
          <div>
          <input type="range" name="height" id="height" min="140" max="210"  required value="
';
echo $row_edit['height'];
echo'"/>
          <span id="heightValue">
	';
	echo $row_edit['height'] . " cm";
echo '</span>
          </div>
          <label for="weight">Weight</label>
          <div>
          <input type="range" name="weight" id="weight" min="50" max="110"  required value="
';
echo $row_edit['weight'];
echo'"/>
          <span id="weightValue">
';
	echo $row_edit['weight'] . " kg";
echo '</span>
          </div>
          <label for="number">Number</label>
          <input type="number" name="number" value="1" id="number" required value="
';
echo $row_edit['number'];
echo'"/>
          <label for="position">Position</label>
          <input type="text" name="position" id="position" required value="
';
echo $row_edit['position'];
echo'"/>
          <label for="age">Date of birth</label>
          <input type="date" name="age" id="age" required value="
';
echo $row_edit['age'];
echo'"/>
          <label for="img">Face image</label>
          <input type="file" name="img" id="img"  required/>
          <button class="btn" type="submit" value="
';
echo $row_edit['id']; 
echo'" name="EditFootb">Update footballer</button>';
          }
         echo'
        </form>
       <button class="btn__close_edit">&times;</button>
      </div>
 
      <div class="modal__confirm hidden">
   	 <button class="btn__close">&times;</button>
   	 <span>
   	   Do you confirm?
   	 </span>
   	 <button class="btn confirm_delete">&#10003; Confirm</button>
  	</div>
      <div class="overlay hidden">
      </div>
	
      
	
    </main>
  </div>
</body>
</html>
';

require_once("db/db_connection_close.php");
?>