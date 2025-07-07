

<!-- Questa pagina è l'equivalente della pagina index.html ma con tutte le
differenze della sezione "logged". Per esempio in alto a destra non è più
possibile registrarsi o effettuare il login ma si accede a un dropdown
menu cliccando la mail in modo tale da accedere alle pagine relative 
all'utente. -->
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

    <!-- icone -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css">

  </head>
  <body>    
  <!--header pagine-->
  <header>
    <div class="hamburger">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </div>
    <a href="#" class="logo"><img class="logo_img" src="../../img/Logo_DBZ_red.png" alt="100px" width="100px">DIVIDE BY ZERO</a>
    <nav class="nav-bar logged">
      <ul>
        <li><a href="events_logged.php">Eventi</a></li>
        <li><a href="community_logged.php">Community</a></li>
        <li><a href="whoweare_logged.php">Chi siamo</a></li>
        <hr class="dash" color="white" size="5" width="100%"></hr>
        <!-- questa è l'unica parte che cabia rispetto al file index.html-->
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
    <div class="overflow-hidden p-3  m-md-3 bg-body-tertiary bg-image  ">
      <div class="col-md-5 p-lg-5 mx-auto my-5">
          <div>
            <div>
            <h1 class="container rectangle text text-light display-4 fw-bold "><div><p></p></div> Welcome to<br>Divide by Zero 
              <p class="lead fw-normal text-light"> una community dove creare, inventare progettare insieme</p> 
              <!-- non è più presente il tasto registrati in quanto l'utente ha già fatto il login -->
            </h1>
            </div>
          </div>
        </div>
    </div>
    
    <div>
      <p> </p>
    </div>
    
    <div class="row align-items-md-stretch" style="margin:auto">
      <div class="col-md-6">
        <div class="h-100 p-5 bg-red rounded-3 text-light ">
          <h2 class="livetext"> Progettiamo insieme </h2>
          <div class="container2">
              <img  src="../../img/brainstorming.png" class="progettiamo-image" width="auto" height="350" style="align-items: center; position:relative; margin: auto;" >
              <p class=" progettiamo-text" style="position:relative;"><br> Attraverso i nostri canali e la newsletter periodica potrai 
                 partecipare alle discussioni, ricevere aggiornamenti e approfondire le tue passioni con una community di persone appassionate come te.
                  Siamo entusiasti di condividere con te le nostre conoscenze e creare legami significativi all'interno della nostra comunità. </p>
            </div>
            <a href="community_logged.php" class=" btn btn-outline-light " role="button"> <i class="ri-team-line"></i> Unisciti alla community</a>
          </div>
          
        </div>
      <div class="col-md-6 mobile">
        <div class="h-100 p-5 bg-collaboriamo border rounded-3">
          
          <h2 class="livetext"> Incontriamoci </h2>
          <div class="contieni">
          <img class="collaboriamo"src="../../img/collaboriamo.jpg"  width="auto" height="350" style="align-items: center; position:relative; margin: auto;">
          <p  class="collaboriamo-text" style="position:relative;"> <br> Organizziamo workshop, eventi e occasioni di networking per 
            stimolare la condivisione di conoscenze e favorire la collaborazione. Entra a far parte della nostra community per avere l'opportunità di incontrare 
            persone appassionate e realizzare progetti insieme.</p>
          </div>
          <a href="events_logged.php" class="btn btn-outline-secondary "  type="button"> <i class="ri-calendar-event-fill"></i> I nostri eventi</a>
          </div>
          
        </div>
      </div>
    </div>
    
    <div>
      <p> </p>
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
        <form action="../newsletter.php" method="POST" name="newsletter" class="col-md">
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
  
  </body>
</html>
