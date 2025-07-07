
<!--Ajax file per visualizzare la pagina che mostra gli eventi 
in maniera dinamica. Li prende dal database e utilizza un
un themeplate uguale per tutti mentre descrizione, data, locandina, ora e partecipanti
sono personalizzati per ogni singolo evento. -->
<?php
include "../dbconn_toevents.inc.php";

$eventid = $_POST['eventid'];

$query = "SELECT *
          FROM events
          WHERE id=".$eventid;
$result = mysqli_query($dbconn, $query);
while($row = mysqli_fetch_array($result)) {
?>
<table border='0' width='100%'>
<tr>
    <td width="auto"><img src="../<?php echo $row['image']; ?>" width="300" height="300"></td>
    <td style="padding:20px;">
        <p style="font-weight: bold;">Title : <?php echo $row['title']; ?></p>
        <p>Description : <?php echo $row['description']; ?></p>
        <p>Date : <?php echo $row['day']; ?> <?php echo $row['month']; ?></p>
        <p>Time : <?php echo $row['time']; ?></p>

        <!--Conto dei partecipanti già iscritti-->
        <?php
            include "dbconn_topartecipants.inc.php";
            
            $query_1 = "SELECT COUNT(*) AS count
                        FROM events JOIN partecipants ON events.id = '$eventid' AND events.id = partecipants.id" ;
            
            $result_1 = mysqli_query($dbconn, $query_1);
            if ($result_1) {
                $row_1 = mysqli_fetch_assoc($result_1);
            } else { echo "Errore nella query: " . mysqli_error($dbconn);}
        ?>
        <p style="color:#C11D15;">Partecipants : <?php echo $row_1['count']; ?> / 50</p>
      
    </td>
</tr>
</table>

<?php } ?>