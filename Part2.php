<?php
//Give the name of the program here
//Include your name and the date here
//Give a brief description of what the program does
$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "tennisclub";
$port = 3306;

//set the default timezone - this is necessary since MySQL 8. This is an effort to store all dates and times together with their timezones. 
//This is particularly important where there is a timestamp indicating when something happened.
date_default_timezone_set('Europe/Dublin');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    
   
    $sql = "INSERT INTO member (firstname, surname) VALUES ('$firstname', '$surname')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New member added successfully: $firstname $surname";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method.";
}

mysqli_close($conn);
?>
