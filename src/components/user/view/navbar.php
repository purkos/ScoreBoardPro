<?php
  //GET USERDATA
  $sql_user = "SELECT * FROM users WHERE id='$userId'";
  $result_user = mysqli_query($conn, $sql_user);
  $row_user = mysqli_fetch_assoc($result_user);

  echo '
    <section class="navbar">
        <div class="page__title">
        ';
        echo $page_name;
        echo'
        </div>

        <a href="../profile/" class="user__profile_link"><div class="user__profile__logo">
          <div class="user__profile__img">';
          if($row_user['img']=='') {
            echo '
              <i class="ph-user-fill user__profile__img_icon"></i>
            ';
          } else {
            echo '
            <img src="../users/users_images/';
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
  ';;
?>  