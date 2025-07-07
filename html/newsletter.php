<?php

$user = 'log';
$password = 'Password2023!';
$host = 'localhost';
$port = 3306;
$dbase = 'log';
$table = 'newsletter';

// Connessione a dbase
$dbconn = new mysqli($host, $user, $password, $dbase, $port);

if ($dbconn->connect_error) {
    die('Could not connect: ' . mysqli_error($dbconn));
}

// Creazione tabella newsletter per gestione mail
$query = "CREATE TABLE IF NOT EXISTS $table (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `email` TEXT NOT NULL,
    `date` DATE NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE `uniqueemail` (`email`))
ENGINE = InnoDB;";

$result = mysqli_query($dbconn, $query)
    or die('Error creating table. ' . mysqli_error($dbconn));


$email = $_POST['email'];

// Ricerca della mail all'interndo della tabella "newsletter"
$query = "SELECT email
          FROM $table
          where email='$email'";
$result = mysqli_query($dbconn, $query);

// Verifica che la mail non sia già registrata alla newsletter
if ($result->num_rows > 0) {
    header("Refresh: 3; URL=" . $_SERVER['HTTP_REFERER']);
    echo 'This email has been already subscribed.<br/>You will be redirected soon...';
    exit;
} else {
    
    $date = date("Y-m-d H:i:s");
    
    // Inserimento della nuova mail nella tabella
    $query = "INSERT INTO $table (email, date) VALUES ('$email', '$date')";
    $result = mysqli_query($dbconn, $query) 
    or die('Error inserting email: ' . mysqli_error($dbconn));
    
    header("Refresh: 3; URL=".$_SERVER['HTTP_REFERER']);
    echo 'Your email has been successfully added.<br/>You will be redirected soon...';
    exit;
}

mysqli_close($dbconn);