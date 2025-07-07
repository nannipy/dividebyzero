<?php

require_once 'connection.inc.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Ricerca della mail all'interndo della tabella "users"
$query = "SELECT id, email, password
          FROM $table
          where (email='$email' AND password='$password')";
$result = mysqli_query($dbconn, $query);
$row = mysqli_fetch_array($result);

// Verifica che la mail non sia già registrata alla newsletter
if ($result->num_rows == 0) {
    header("Refresh: 3; URL=index.html");
    echo 'There is no account associated to this email address yet.<br/>You will be redirected soon...';
    exit;
} else {
    session_start();
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];

    header("Refresh: 3; URL=logged/logged.php");
    echo 'You have been successfully logged.<br/>You will be redirected soon...';
    exit;
}    
mysqli_close($dbconn);