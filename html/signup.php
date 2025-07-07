<?php

require_once 'connection.inc.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Ricerca della mail all'interndo della tabella "users"
$query = "SELECT email
          FROM $table
          where (email='$email')";
$result = mysqli_query($dbconn, $query);

// Verifica che la mail non sia già registrata alla newsletter
if ($result->num_rows > 0) {
    header("Refresh: 3; URL=index.html");
    echo 'This email has been already subscribed.<br/>You will be redirected soon...';
    exit;
}


// Inserimento del nuovo user nella tabella
$date = date("Y-m-d H:i:s");

$query = "INSERT INTO users (email, password, date) VALUES ('$email', '$password', '$date')";
$result = mysqli_query($dbconn, $query) 
or die('Error inserting email: ' . mysqli_error($dbconn));

$query = "SELECT id, email
          FROM $table
          where (email='$email')";
$result = mysqli_query($dbconn, $query);
$row = mysqli_fetch_array($result);

session_start();
$_SESSION['id'] = $row['id'];
$_SESSION['email'] = $row['email'];

header("Refresh: 3; URL=logged/logged.php");
echo 'Your have been successfully subscribed.<br/>You will be redirected soon...';
exit;

mysqli_close($dbconn);