
<!-- Questo file php interagisce con il database, per cambiare le credenziali
dell'utente già loggato. Per fare questo prima imposta le nuove credenziali e poi ricerca con una
query la mail nella tabella degli utente registrati. Una volta verificato questo,
esegue delle query per aggiornare il database con le nuove informazioni  -->

<?php

require_once '../connection.inc.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Ricerca della mail all'interndo della tabella "users"
$query = "SELECT *
          FROM $table
          WHERE $table.email='$email'";
$result = mysqli_query($dbconn, $query);
$row = mysqli_fetch_array($result);

// Verifica che la mail non sia già registrata alla newsletter
if ($result->num_rows == 1) {

    if ($name != null) {
        $query = "UPDATE $table
                  SET $table.name = '$name'
                  WHERE $table.email = '$email'";
        $result = mysqli_query($dbconn, $query);
        if (!$result) { header("Refresh: 2; URL=".$_SERVER['HTTP_REFERER']);
                        echo 'Something went wrong.<br/>You will be redirected soon...';
                        exit;
                      }
    }
    
    if ($surname != null) {
        $query = "UPDATE $table
                    SET $table.surname = '$surname'
                    WHERE $table.email = '$email'";
        $result = mysqli_query($dbconn, $query);
        if (!$result) { header("Refresh: 2; URL=".$_SERVER['HTTP_REFERER']);
                        echo 'Something went wrong.<br/>You will be redirected soon...';
                        exit;
                      }
    }
    
    if ($password != null) {
        $query = "UPDATE $table
                    SET $table.password = '$password'
                    WHERE $table.email = '$email'";
        $result = mysqli_query($dbconn, $query);
        if (!$result) { header("Refresh: 2; URL=".$_SERVER['HTTP_REFERER']);
                        echo 'Something went wrong.<br/>You will be redirected soon...';
                        exit;
                      }
    }

    header("Refresh: 2; URL=".$_SERVER['HTTP_REFERER']);
    echo 'You have successfully changed your credentials.<br/>You will be redirected soon...';
    exit;

} else {

    header("Refresh: 2; URL=".$_SERVER['HTTP_REFERER']);
    echo 'Something went wrong.<br/>You will be redirected soon...';
    exit;
}    
mysqli_close($dbconn);
?>