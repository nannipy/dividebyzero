
<!-- Questo file php permette prima di connettersi al database,
per iscrivere l'utente ad un singolo evento.
Prima però viene effettuato un controllo e se l'utente è già iscritto 
oppure l'evento ha già raggiunto 50 partecipanti restituisce un errore -->
<?php

$user = 'log';
$password = 'Password2023!';
$host = 'localhost';
$port = 3306;
$dbase = 'log';
$table = 'partecipants';

$dbconn = new mysqli($host, $user, $password, $dbase, $port);

if ($dbconn->connect_error) {
    die('Could not connect: ' . mysqli_error($dbconn));
}

if (isset($_GET["event_id"]) && isset($_GET["email"])) {
    $event_id = $_GET["event_id"];
    $email = $_GET["email"];
}

// Verifica posto disponibile
$query = "SELECT COUNT(*) AS count
          FROM $table
          WHERE $table.id = '$event_id'";

$result = mysqli_query($dbconn, $query);
if ($result->num_rows == 50) {
    header("Refresh: 3; URL=".$_SERVER['HTTP_REFERER']);
    echo 'Sorry, the event is full!<br/>You will be redirected soon...';
    exit;
}

// Verifica di iscrizione già avvenuta
$query = "SELECT id, email
          FROM $table
          where (email='$email' AND id='$event_id')";
$result = mysqli_query($dbconn, $query);
if ($result->num_rows == 1) {
    header("Refresh: 3; URL=".$_SERVER['HTTP_REFERER']);
    echo 'You have been already subscribed!<br/>You will be redirected soon...';
    exit;
} else {

    $query = "INSERT INTO $table (id, email) VALUES ('$event_id', '$email')";

    $result = mysqli_query($dbconn, $query);
    if ($result) {
        header("Refresh: 3; URL=".$_SERVER['HTTP_REFERER']);
        echo 'You have been successfully subscribed.<br/>You will be redirected soon...';
        exit;
    } else {
        header("Refresh: 3; URL=".$_SERVER['HTTP_REFERER']);
        echo 'Something went wrong.<br/>You will be redirected soon...';
        exit;
    }
}

mysqli_close($dbconn);
?>