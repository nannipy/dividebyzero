
<!-- Questa pagina è l'equivalente della pagina whoweare.html con l'unica differenza,
come per tutti i file "logged", in alto a destra si trova la mail dell'utente con 
un relativo menu dropdown dove è possibile navigare tra le opzioni da utente registrato -->

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
        <li><a href="events_logged.php">Eventi</a></li>
        <li><a href="community_logged.php">Community</a></li>
        <li><a class="active" href="#">Chi siamo</a></li>
        <hr class="dash" color="white" size="5" width="100%"></hr>
        <!--Iscrizione utente (questa è l'unica differenza con la pagina whoweare.php) -->
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
    <section class="bg-blue" style="margin-left: 10px; margin-right: 10px;" id="team">
      <div class="container">
        <div><p></p></div>
        <div class="row">
          <div class="col-sm-6">
            <div class="team-member">
              <div><p><br></p></div>
              <h2 class=" text-light visione livetext "> LA NOSTRA VISIONE</h2>
              <h3 class=" text-light descrizionewwa">  <span style="color:#C11D15 ;">Divide by Zero </span>è un luogo che unisce la passione per la<span style="color:yellow;">
                tecnologia</span> e le <span style="color:yellow;">persone,</span> creando uno spazio di connessione e collaborazione. <br/>
                Organizziamo <span style="color:lightgreen;">workshop</span>, eventi e occasioni di networking per stimolare la  <span style="color:lightseagreen;">condivisione</span> di conoscenze e favorire la collaborazione. <br/>
                Entra a far parte della nostra <span style="color:#5A65F4;">community </span> per avere l'opportunità di incontrare persone appassionate e realizzare progetti  <span style="color:#C11D15 ;">insieme.</span>  </h3>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="team-member">
              <img class=" logowwa rounded-circle" src="../../img/Logo_DBZ_red-blue.png" width="300" height="300">
              <div><p></p></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div>
      <p> </p>
    </div>
      <!-- Team -->
      <section class="bg-light" id="team">
        <div class="container">
          <div><p></p></div>
          <div class="row">
            <div class="col-sm-6">
              <div class="team-member">
                <img class="mx-auto rounded-circle" id="rotazione" src="../../img/foto_profilo_linkedin.png" width="200" height="200">
                <div><p></p></div>
                <h4>Giovanni Battista Pernazza</h4>
                <p class="text-muted">Matricola: 1936239</p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="team-member">
                <img class="mx-auto rounded-circle" id="rotazione"src="../../img/propic.png" width="200" height="200">
                <div><p></p></div>
                <h4>Alessandro Maone</h4>
                <p class="text-muted">Matricola: 1945149</p>
              </div>
            </div>
          </div>
        </div>
      </section>
  </main>

  <script src="../../script.js"></script>

  <!--fondo pagina-->
  <footer class="py-5">
    <div class="row">
      <div class="col-6 col-md" style="text-align: center;">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Chi siamo</a></li>
          <li><a class="link-secondary" href="#">Privacy</a></li>
          <li><a class="link-secondary" href="#">Terms</a></li>
        </ul>
      </div>
      <div class="col-6 col-md elemento" style="text-align: center;">
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
</html>
