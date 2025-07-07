<!--  
    connection.inc.php
      File php per la connessione con la tabella 'users', utilizzata per la registrazione dei dati utente al
      momento della registrazione e per la verifica delle credenziali durante i login.
      Si è scelto di implementare un file apposito per la connessione a tale tabella per evitare overhead
      di codice.
-->

<?php

$user = 'log';
$password = 'Password2023!';
$host = 'localhost';
$port = 3306;
$dbase = 'log';
$table = 'users';

// Connessione a dbase
$dbconn = new mysqli($host, $user, $password, $dbase, $port);

if ($dbconn->connect_error) {
    die('Could not connect: ' . mysqli_error($dbconn));
}

// Creazione tabella users per gestione profili (se non già esistente)
$query = "CREATE TABLE IF NOT EXISTS $table (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `name` TEXT NULL ,
    `surname` TEXT NULL ,
    `email` TEXT NOT NULL ,
    `password` TEXT NOT NULL ,
    `date` DATE NOT NULL ,
    PRIMARY KEY (`id`),
    UNIQUE `uniqueemail` (`email`))
ENGINE = InnoDB;";

$result = mysqli_query($dbconn, $query)
    or die('Error creating table. ' . mysqli_error($dbconn));