<?php
  require_once("../db/db_connection.php");

  //USER SESSION
  session_start();
  $userId = $_SESSION['userId'];


  $sql_ranking = "SELECT f.name,f.age,f.club,f.img, AVG(r.rating) as avg_rating, count(rating) as counter_rating FROM ratings r JOIN footballers f ON r.footballer_id = f.id GROUP BY r.footballer_id ORDER BY avg_rating DESC";
  $result_ranking = mysqli_query($conn,$sql_ranking);

  $page_name = "Ranking";


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
  <script src="../index.js" defer></script>
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
      <section class="ranking">
      ';

      if(mysqli_num_rows($result_ranking)>0) {
        $counter=1;
          while($row=mysqli_fetch_assoc($result_ranking)) {
            $age = date_diff(date_create($row['age']), date_create('now'))->y;
            echo '
            <div class="ranking__card">
              <div class="position__footballer__info">
                <div class="position">
                ';
                echo $counter;
                echo '
                </div>
                <img src="../footballers_images/'.$row['img'].'" alt="';echo $row['img'];echo'" class="ranking__card__img">
                <span class="footballer_name">
                ';
                echo $row['name'];
                echo '
                </span>
                <span class="footballer_info">&mdash;</span>
                <span class="footballer_info">
                ';
                echo $row['club'];
                echo '
                </span>
                <span class="footballer_info">&mdash;</span>
                <span class="footballer_info">
                ';
                echo $age . ' years old';
                echo '
                </span>
              </div>
              <div class="rating__counter"><span>
              ';
              echo $row['counter_rating'] . ' ratings';
              echo '
              </span></div>
              <div class="player__rating"><span>
              ';
              echo number_format($row['avg_rating'], 1);
              echo '
              </span><i class="ph-star-fill soccer__icon"></i></div>
          </div>
            ';
            $counter++;
          }
      } else {
        
      }
      echo '
      </section>
    </main>
  </div>
</body>
</html>
';

require_once("../db/db_connection_close.php");
?>