<!--  
    ajaxfile.php
      File ajax che, al momento del click su un apposito button, riempie il modal per la visualizzazione
      delle informazioni più approfondite per il relativo evento in programma. Le info sono estratte dalla
      tabella 'events', dove gli amministratori del sito possono aggiungere, aggiornare o rimuovere eventi.
-->

<?php
include "dbconn_toevents.inc.php";

$eventid = $_POST['eventid'];

// Si ricercano le info relative l'evento per cui si sta eseguendo codice ajax e passato dalla richiesta POST
$query = "SELECT *
          FROM events
          WHERE id=".$eventid;
$result = mysqli_query($dbconn, $query);
while($row = mysqli_fetch_array($result)) {
?>

<!-- Costruzione dinamica del corpo del modal -->
<table border='0' width='100%'>
<tr>
    <td width="auto"><img src="<?php echo $row['image']; ?>" width="300" height="300"></td>
    <td style="padding:20px;">
        <p style="font-weight: bold;">Title : <?php echo $row['title']; ?></p>
        <p>Description : <?php echo $row['description']; ?></p>
        <p>Date : <?php echo $row['day']; ?> <?php echo $row['month']; ?></p>
        <p>Time : <?php echo $row['time']; ?></p>
    </td>
</tr>
</table>

<?php } ?>