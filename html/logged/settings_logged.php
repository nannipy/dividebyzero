
<!-- La pagina settings è necessaria alla gestione delle impostazioni del profilo
dell'utente. È possibile quindi cambiare nome, cognome e password.-->

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
        <li><a href="whoweare_logged.php">Chi siamo</a></li>
        <hr class="dash" color="white" size="5" width="100%"></hr>
        <li class="dash"><a href="#"> <i class="ri-settings-5-line"></i> Impostazioni account</a></li>
        <li class="dash"><a href="prenotazioni_logged.php"> <i class="ri-calendar-event-line"></i> Prenotazioni</a></li>
        <li class="dash"><a href="logout.php"> <i class="ri-logout-box-line"></i> Esci</a></li>
      </ul>
    </nav>
    <div class="login_logged dropdown">
      <a class="acc" id="login-open"><i class="ri-user-fill"></i><div class="email_div"><?php echo $user_email ?></div></a>
      <div class="dropdown-content">
        <a href="#"> <i class="ri-settings-5-line"></i> Impostazioni account</a>
        <a href="prenotazioni_logged.php"> <i class="ri-calendar-event-line"></i> Prenotazioni</a>
        <a href="logout.php"> <i class="ri-logout-box-line"></i> Esci</a>
      </div>
    </div>
  </header>

  <!--Sezione principale dove è presente il form per cambiare le credenziali dell'utente.
      Una volta cliccato su invio il form  effettua le modifiche ll'interno del database 
      tramite il file change.php-->
  <main>
    <h2 style="text-align: center; justify-content: center; font-weight: 700; padding-top: 36px;"> <i class="ri-settings-5-line"></i> Impostazioni Account </h2>
    <h5 style="text-align: center; justify-content: center; font-weight: 400;"> reimposta le tue credenziali </h5>
    <form action="change.php" method="POST">
      <div class="form_settings_logged" style="text-align: center;">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group" style="text-align: center; display: none;">
              <input type="text" class="form-control" value="<?php echo $user_email ?>" name="email" placeholder="Nome">
            </div>
            <div class="form-group" style="text-align: center;">
              <label for="name"> Nome</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
            </div>
            <div class="form-group" style="text-align: center;">
              <label for="surname"> Cognome</label>
              <input type="text" class="form-control" id="surname" name="surname" placeholder="Cognome">
            </div>
            <div class="form-group" style="text-align: center;">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="cred_psw" name="password" placeholder="Password">
            </div>
            
            <div><p></p></div>
            <input type="submit" value="Invio" class="btn btn-bd-primary button"></input>
          </div>
        </div>
      </div>
    </form>
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
</html>
