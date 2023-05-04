<?php
    require_once("../db/db_connection.php");
    session_start();
    $userId = $_SESSION['userId'];


    $sql_user = "SELECT * FROM users WHERE id='$userId'";
    $result_user = mysqli_query($conn, $sql_user);
    $row_user = mysqli_fetch_assoc($result_user);

    if($_SERVER['REQUEST_METHOD']==="GET") {
      if(isset($_GET['footballer_id'])) {
          $footballer_id = $_GET['footballer_id'];
          $season = $_GET['season'];
          $club = $_GET['club'];
          $goals = $_GET['goals'];
          $assists = $_GET['assists'];
          $yellowCards = $_GET['yellowCards'];
          $redCards = $_GET['redCards'];

          $sql = "INSERT INTO footballer_info (footballer_id,season,team,goals,assists,yellow_cards,red_cards) VALUES ('$footballer_id','$season','$club','$goals','$assists','$yellowCards','$redCards')";
          mysqli_query($conn, $sql);

      
          $url = './?footballerId=' . urlencode($footballer_id);
          http_response_code(302);
          header("Location: $url");
      }


        $footballerId = $_GET['footballerId'];
        
        $sql = "SELECT * FROM footballers f JOIN footballer_info fi  WHERE f.id = $footballerId";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        
        $sql_stats = "SELECT * FROM footballer_info fi JOIN footballers f ON f.id =fi.footballer_id WHERE fi.footballer_id = $footballerId";
        $result_stats = mysqli_query($conn,$sql_stats); 
        $page_name = "Footballer profile";
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
      <section class="footballer">
      ';
      if($row_user['role']=='Admin') {
        echo '
        <button class="btn__open_modal">Add stats</button>
        ';
        echo '
          <div class="modal hidden">
            <button class="btn__close_modal">&times;</button>

            <form action="./" method="GET" class="add__footballer_stats_form">
              <label for="season">Season </label>
              <input type="text" name="season" id="season" required/>
              <label for="club">Club</label>
              <input type="text" name="club" id="club" required/>
              <label for="goals">Goals</label>
              <input type="number" name="goals" id="goals" required/>
              <label for="assists">Assists</label>
              <input type="number" name="assists" id="assists" required/>
              <label for="yellowCards">Yellow Cards</label>
              <input type="number" name="yellowCards" id="yellowCards" required/>
              <label for="redCards">Red Cards</label>
              <input type="number" name="redCards" id="redCards" required/>
              <button class="addStats" name="footballer_id" value="
              ';
              echo $footballerId;
              echo'
              ">Add Stats</button>
            </form>
          </div>
          <div class="overlay hidden">
          </div>
        ';
      }
      echo'
        <div class="footballer__info">
          <span class="number">';
          echo $row['number'];
          echo '</span>
          <span class="name">';
          echo $row['name'];
          echo '</span>
        </div>
        <img src="../footballers_images/';
        echo $row['img'];
        echo '" alt="';echo $row['img']; echo '" class="profile__img">
        <div class="general__info">
          <div class="general__info_item">
            <span class="general__info_item_heading">
              Nationality
            </span>
            <span>';
              echo $row['nationality'];
            echo '</span>
          </div>
          <div class="general__info_item">
            <span class="general__info_item_heading">
              Position
            </span>';
              echo $row['position'];
            echo '
            <span>
            </span>
          </div>
          <div class="general__info_item">
            <span class="general__info_item_heading">
              Height
            </span>';
              echo $row['height'] . " cm";
            echo '
            <span>
            
            </span>
          </div>
          <div class="general__info_item">
            <span class="general__info_item_heading">
              Weight
            </span>';
              echo $row['weight'] . " kg";
            echo '
            <span>
            
            </span>
          </div>
          <div class="general__info_item">
            <span class="general__info_item_heading"> 
              Current Team
            </span>
            <span>';
              echo $row['club'];
            echo '
            </span>
          </div>
          <div class="general__info_item">
            <span class="general__info_item_heading">
              Birthday
            </span>
            <span>';
              echo $row['age'];
            echo '
            </span>
          </div>
        </div>
        ';
        if(mysqli_num_rows($result_stats)>0) {

        
        echo '
        <div class="footballer__stats">
          <table>
            <thead>
              <tr>
                <td class="league" colspan="6">';  
                  echo $row['league'];
                echo '</td>
              </tr>
              <tr>
                <td>Season</td>
                <td>Team</td>
                <td>Goals</td>
                <td>Assists</td>
                <td>Yellow Cards</td>
                <td>Red Cards</td>
              </tr>
            </thead>
            <tbody>
            ';
            while($row_stats = mysqli_fetch_assoc($result_stats)) {
              echo '
              <tr>
              <td>';
              echo $row_stats['season'];
              echo'
              </td>
              <td>';
              echo $row_stats['team'];
              echo'
              </td>
              <td>';
              echo $row_stats['goals'];
              echo'
              </td>
              <td>';
              echo $row_stats['assists'];
              echo'
              </td>
              <td>';
              echo $row_stats['yellow_cards'];
              echo'
              </td>
              <td>';
              echo $row_stats['red_cards'];
              echo'
              </td>
              </tr>
              ';
            } 
            echo'
            </tbody>
            </table>
            </div>
        ';
        } else {
              echo "<span class='footballer__stats_error'>We don't have information yet</span>";
            }
        echo'
            </section>
            </main>
            </div>
</body>
</html>
  ';
    require_once("../db/db_connection_close.php");

?>