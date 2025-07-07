
<!-- Questo file php è equivalente file events.php . Infatti non è molto diverso rispetto 
al precedente se non per la presenza di un nuovo tasto per dare la possibilità di 
iscriversi all'evento "Join" e come per tutti i file "logged" in alto a destra si trova la mail dell'utente con 
un relativo menu dropdown dove è possibile navigare tra le opzioni da utente registrato-->

<?php
session_start();

$user_id = $_SESSION['id'];
$user_email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Giovanni Pernazza & Alessandro Maone">
    <title>Divide by Zero</title>
    <link rel="icon" type="image/x-icon" href="../../img/Logo_DBZ_red.png">
    <link rel="stylesheet" href="../../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- icone -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css">
    
  </head>
  <body>
    <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
    
  <!--header pagine-->
  <header>
    <div class="hamburger">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </div>
    <a href="logged.php" class="logo"><img class="logo_img" src="../../img/Logo_DBZ_red.png" alt="100px" width="100px"> DIVIDE BY ZERO</a>
    <nav class="nav-bar logged">
      <ul>
        <li><a class="active" href="#">Eventi</a></li>
        <li><a href="community_logged.php">Community</a></li>
        <li><a href="whoweare_logged.php">Chi siamo</a></li>
        <hr class="dash" color="white" size="5" width="100%"></hr>
        <li class="dash"><a href="settings_logged.php"> <i class="ri-settings-5-line"></i> Impostazioni account</a></li>
        <li class="dash"><a href="prenotazioni_logged.php"> <i class="ri-calendar-event-line"></i> Prenotazioni</a></li>
        <li class="dash"><a href="logout.php"> <i class="ri-logout-box-line"></i> Esci</a></li>
      </ul>
    </nav>
    <div class="login_logged dropdown">
      <a class="acc" id="login-open"><i class="ri-user-fill"></i><div class="email_div"><?php echo $user_email ?></div></a>
      <div class="dropdown-content">
        <a href="settings_logged.php"> <i class="ri-settings-5-line"></i> Impostazioni account</a>
        <a href="prenotazioni_logged.php"> <i class="ri-calendar-event-line"></i> Prenotazioni</a>
        <a href="logout.php"> <i class="ri-logout-box-line"></i> Esci</a>
      </div>
    </div>
  </header>

  <!--sezione principale-->
  <main>
  <h2 style="text-align: center; justify-content: center; padding-top: 30px;"> <i class="ri-calendar-event-line"></i> Eventi </h2>

    <div class="event-container">

      <?php
        include "../dbconn_toevents.inc.php";
        $query = "SELECT *
                  FROM events";
        $result = mysqli_query($dbconn, $query);

        while($row = mysqli_fetch_array($result)) {
      ?>
      
      <div class="event">
        <div class="event-left">
          <div class="event-date">
            <div class="date"><?php echo $row['day']; ?></div>
            <div class="month"><?php echo $row['month']; ?></div>
          </div>
          <div class="event-image">
            <img src="../<?php echo $row['image']; ?>" width="150" weight="150">
          </div>
        </div>

        <div class="event-right">
          <h3 class="event-title"> <?php echo $row['title']; ?> </h3>

          <div class="event-description">
          <?php echo $row['description']; ?> 
          </div>

          <div class="event-timing">
            <?php echo $row['time']; ?>
          </div>

          <!--Iscrizione utente (questa è l'unica differenza con la pagina events.php) -->
          <button type="button" class="event-sub" onclick="iscriviUtente('<?php echo $row['id']; ?>', '<?php echo $_SESSION['email']; ?>')">Join</button>

          <button data-id='<?php echo $row['id']; ?>' class="event-info">
            Info
          </button>
        </div>
      </div>
      <?php
      }
      mysqli_close($dbconn);
      ?>
      
      <script type ="text/javascript">
        function iscriviUtente(event_id, email) {
          window.location.href = "iscrizione.php?event_id=" + event_id + "&email=" + email;
        }
      </script>

      <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Event Info</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      
      <!--Visualizzazione modal-->
      <script type ="text/javascript">
        $(document).ready(function() {
          $(".event-info").click(function() {
            var eventid = $(this).data("id");
            $.ajax({
              url: "ajaxfile_logged.php",
              type: "POST",
              data: {eventid: eventid},
              success: function(response){
                $(".modal-body").html(response);
                $("#empModal").modal("show");
              }
            });
          });
        });
      </script>
    </div>
  </main>

  <script src="../../script.js"></script>

  <!--fondo pagina-->
  <footer class="py-5">
    <div class="row">
      <div class="col-6 col-md" style="text-align: center;">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="whoweare_logged.php">Chi siamo</a></li>
          <li><a class="link-secondary" href="#">Privacy</a></li>
          <li><a class="link-secondary" href="#">Terms</a></li>
        </ul>
      </div>
      <div class="col-6 col-md" style="text-align: center;">
        <h5>Newsletter</h5>
        <br>
        <form action="../newsletter.php" method="POST" name="newsletter" class="col-md" onsubmit="verificaForm();">
          <input type="email" name="email" placeholder="Your email address" class="form-control" style="text-align: center;">
          <br style="line-height: 10%;">
          <input type="submit" value="SUBSCRIBE NOW" class="btn btn-bd-primary">
        </form>
      </div>
      <div class="col-6 col-md" style="text-align: center;">
        <h5>Contact</h5>
        <ul class="list-unstyled text-small">
          <li>
            <a href="https://www.instagram.com/dividebyzero.community/" class="social_icon"><i class="ri-instagram-line"></i></a>
            <a href="https://discord.gg/5gD6bk52" class="social_icon"><i class="ri-discord-fill"></i></a>
            <a href="https://www.reddit.com/r/divide_by_zero/" class="social_icon"><i class="ri-reddit-fill"></i></a>
            <a href="https://github.com/nannipy/dividebyzero.git" class="social_icon"><i class="ri-github-fill"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
</html>
