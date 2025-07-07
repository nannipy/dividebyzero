
<!-- Questo file php esegue le istruzioni per il logout.
In questo modo viene distrutta la sessione aperta e
viene restituito un messaggio all'utente per avvertirlo del logout effettuato-->

<?php

session_unset();
session_destroy();

echo 'Your have been successfully logged.';
header("Location: ../index.html");
exit();

?>