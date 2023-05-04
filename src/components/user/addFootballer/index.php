<?php

   require_once("../db/db_connection.php");
  $page_name = "Add footballer";

  //USER SESSION
  session_start();
  $userId = $_SESSION['userId'];

  $sql_ranking = "SELECT f.name,f.age,f.club,f.img, AVG(r.rating) as avg_rating, count(rating) as counter_rating FROM ratings r JOIN footballers f ON r.footballer_id = f.id GROUP BY r.footballer_id ORDER BY avg_rating DESC";
  $result_ranking = mysqli_query($conn,$sql_ranking);

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(isset($_POST['AddFootballer'])) { 
    
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


    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $footballerImg = $_FILES['img']['name'];
    $file_extension = strtolower(pathinfo($footballerImg, PATHINFO_EXTENSION));
    
    $name_with_underscore = str_replace(" ", "_", $name);
    $footballerImgNew = $name_with_underscore . "." . $file_extension;
    
    $tmp = $_FILES['img']['tmp_name'];
    $dest_folder = '../footballers_images/' . $footballerImgNew;
    move_uploaded_file($tmp,$dest_folder);


    if (!in_array($file_extension, $allowed_extensions)) {
      echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
    } else {

      $sql = "SELECT * FROM footballers WHERE name = '$name'"; 
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0) {
        echo "This footballer already exists in database";
      } else {
        $sql_add_footballer = "INSERT INTO footballers (name, club, nationality, league, height, weight, number, position, age, img) VALUES ('$name','$club','$nationality','$league','$height','$weight','$number','$position','$formattedDateOfBirth','$footballerImgNew')";
        mysqli_query($conn, $sql_add_footballer); 
        header('Location: ../');
      }
    }
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
  <link rel="icon" type="image/x-icon" href="../../../../public/images/ScoreBoardPro.png">
  <script src="https://unpkg.com/phosphor-icons"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/queries.css">
  <script src="index.js" defer></script>
  <script src="../index.js" defer></script>
  <script src="../view/index.js" defer></script>


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
      <section class="add__footballer">
        <form class="add__footballer_form form__login " method="POST" action="./" enctype="multipart/form-data">
          <label for="name">Name</label>
          <input type="text" name="name" id="name"  required/>
          <label for="club">Club </label>
          <input type="text" name="club" id="club" required />
          <label for="nationality">Nationality</label>
          <input type="text" name="nationality" id="nationality" required />
          <label for="league">League</label>
          <input type="text" name="league" id="league" required />
          <label for="height">Height
          </label>
          <div>
          <input type="range" name="height" id="height" min="140" max="210" value="150" required />
          <span id="heightValue">160 cm</span>
          </div>
          <label for="weight">Weight</label>
          <div>
          <input type="range" name="weight" id="weight" min="50" max="110" value="70" required />
          <span id="weightValue">70 kg</span>
          </div>
          <label for="number">Number</label>
          <input type="number" name="number" value="1" id="number" required />
          <label for="position">Position</label>
          <input type="text" name="position" id="position" required />
          <label for="age">Date of birth</label>
          <input type="date" name="age" id="age" required />
          <label for="img">Face image</label>
          <input type="file" name="img" id="img"  required/>
          <button class="btn" type="submit" value="Add" name="AddFootballer">Add footballer &plus;</button>
        </form>
      </section>
    </main>
  </div>
</body>
</html>
';

require_once("../db/db_connection_close.php");
?>