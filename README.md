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
- Open a web browser and go to http://localhost/public to access the project. Replace <repository> with the name of the repository folder in the "htdocs" folder.
