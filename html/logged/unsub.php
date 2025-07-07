
<!-- Questo file php permette di disiscrivere un utente da uno specifico evento.
    Prima si connette al database, poi inizializza l'event_id e email dell'utente
    ed in fine effettua la query DELETE per eliminare l'utente dai partecipanti a 
    quell'evento. Inoltre restituisce una pagina dove mostra il risultato dell'operazione -->
    
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

// Verifica di iscrizione già avvenuta
$query = "SELECT id, email
          FROM $table
          where (email='$email' AND id='$event_id')";
$result = mysqli_query($dbconn, $query);
if ($result->num_rows == 1) {
    $query = "DELETE FROM partecipants
              WHERE `partecipants`.`id` = '$event_id' AND `partecipants`.`email` = '$email'";

    $result = mysqli_query($dbconn, $query);
    if ($result) {
        header("Refresh: 3; URL=".$_SERVER['HTTP_REFERER']);
        echo 'You have been successfully unsubscribed.<br/>You will be redirected soon...';
        exit;
    } else {
        header("Refresh: 3; URL=".$_SERVER['HTTP_REFERER']);
        echo 'Something went wrong.<br/>You will be redirected soon...';
        exit;
    }
} else {
    header("Refresh: 3; URL=".$_SERVER['HTTP_REFERER']);
    echo 'Something went wrong!<br/>You will be redirected soon...';
    exit;
}

mysqli_close($dbconn);
?>