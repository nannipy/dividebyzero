
<!-- Questo file php serve per connettere al database il file ajax_logged.php 
per contare i partecipanti ad uno specifico evento.  -->

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