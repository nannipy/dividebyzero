<!--  
    connection.inc.php
      File php per la connessione con la tabella 'events', utilizzata per salvare gli eventi in programma.
      Si è scelto di implementare un file apposito per la connessione a tale tabella per evitare overhead
      di codice.
-->

<?php

$user = 'log';
$password = 'Password2023!';
$host = 'localhost';
$port = 3306;
$dbase = 'log';
$table = 'events';

// Connessione a dbase
$dbconn = new mysqli($host, $user, $password, $dbase, $port);

if ($dbconn->connect_error) {
    die('Could not connect: ' . mysqli_error($dbconn));
}