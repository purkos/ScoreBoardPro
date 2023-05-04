<?php

  $sql_user = "SELECT * FROM users WHERE id='$userId'";
  $result_user = mysqli_query($conn, $sql_user);
  $row_user = mysqli_fetch_assoc($result_user);


  echo '
    <header class="header">
      <nav class="main__nav">
        <ul class="nav__list">
          <a href="../" class="nav__item">
            <li><i class="ph-users-three-fill nav-icon"></i> Footballers</li>
          </a>
          <a href="../ranking" class="nav__item">
            <li><i class="ph-trophy-fill nav-icon"></i> Ranking</li>
          </a>
        </ul>
        <ul class="user__list">
          <a href="../profile" class="nav__item">
            <li><i class="ph-user-fill nav-icon"></i>Profile</li>
          </a>
          ';
          if($row_user['role']=='Admin') {
            echo '
              <a href="../users" class="nav__item">
                <li><i class="ph-users-fill nav-icon"></i>Users</li>
              </a>
              <a href="../addFootballer" class="nav__item">
                <li><i class="ph-users-fill nav-icon"></i>Add footballer</li>
              </a>
            ';
          } else {

          }
          echo '
          <a href="../../../php/logout.php" class="nav__item">
            <li><i class="ph-sign-out-fill nav-icon"></i> Log out</li>
            </a>
            </ul>
        </nav>
      <button class="menu open-menu"><i class="ph-fill ph-list"></i></button>
    </header>
  ';
?>