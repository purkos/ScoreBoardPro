# ScoreBoardPro
ScoreBoardPro is a project aimed at providing a platform for rating soccer players based on their statistics. The portal generates rankings of the players based on the ratings given to them by the users. The project is developed using PHP, MySQL, HTML, CSS, JavaScript , and its key functionalities include:


## As a user:

- User registration
- Rating of soccer players
- Access to individual player profiles and rankings
- Edit of user profile picture and rating

## As an admin:

- The same functionalities as a user
- Edit of player data
- Addition of new players
- Deletion of players and users

### Started page

<img width="1418" alt="Zrzut ekranu 2023-05-4 o 19 10 34" src="https://user-images.githubusercontent.com/74377061/236280543-96eb71ae-7ba7-45f8-b990-163bbc6b3bcd.png">
<img width="1419" alt="Zrzut ekranu 2023-05-4 o 19 11 10" src="https://user-images.githubusercontent.com/74377061/236280570-5af11619-68ca-4821-b740-02d31630eed3.png">
<img width="1418" alt="Zrzut ekranu 2023-05-4 o 19 11 24" src="https://user-images.githubusercontent.com/74377061/236280603-e8dbd6c1-279b-4eab-9b56-31e4134d15fd.png">

### Logged user

<img width="1414" alt="Zrzut ekranu 2023-05-4 o 19 12 12" src="https://user-images.githubusercontent.com/74377061/236280636-5d54f843-cf0a-4e1d-ad55-e958331d4017.png">
<img width="1423" alt="Zrzut ekranu 2023-05
<img width="1418" alt="Zrzut ekranu 2023-05-4 o 19 12 51" src="https://user-images.githubusercontent.com/74377061/236280690-79f9bf2c-3e1b-45ce-b744-6b1f3c18c390.png">


## Installation instructions:
To install and run the project on XAMPP, follow the steps below:

- Install XAMPP on your computer. You can download XAMPP from the official website at https://www.apachefriends.org/download.html.
- Clone the repository to your computer by running the following command in the terminal:
```
  git clone https://github.com/purkos/ScoreBoardPro.git
```
- Copy the repository folder to the "htdocs" folder in the XAMPP installation directory.
- Start the XAMPP control panel and start the Apache and MySQL services.
- Open a web browser and go to http://localhost/phpmyadmin/. This will open the phpMyAdmin interface.
- Create a new database for the project by clicking on "New" in the left sidebar and entering a name for the database.
- Import the database schema from the "database.sql" file in the project folder by clicking on the "Import" tab, selecting the file, and clicking "Go".
- Update the database configuration in the "db_connection.php" file in the project folder /src/components/user/db and "sign_in.php", "sign_up.php? in /src/php to match your MySQL database settings (database name, username, password, and host).
- Open a web browser and go to http://localhost/public to access the project. 
