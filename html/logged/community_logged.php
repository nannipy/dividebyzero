
<!-- Questa è la pagina riservata ai link della community equivalente a community.html . L'unica differenza
si trova nell header dove sono è presente la mail dell'utente con un relativo menu dropdown
dove è possibile navigare tra le opzioni da utente registrato -->
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
        <li><a class="active" href="#">Community</a></li>
        <li><a href="whoweare_logged.php">Chi siamo</a></li>
        <hr class="dash" color="white" size="5" width="100%"></hr>
        <!-- Nuove voci per sezione utente -->
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
    <div class="row align-items-md-stretch" style="margin:auto">
        <div class="col-md-6 mobile">
          <div class=" animationbumpopposite h-100 p-5 bg-violet rounded-3 text-light">
            <h2 class="livetext"><i class="ri-discord-fill"></i> Discord</h2>
            <p>Il nostro canale Discord è un luogo in cui puoi divertirti e rilassarti.
              Organizziamo regolarmente giochi, competizioni e attività interattive che ti
              permetteranno di conoscere meglio gli altri membri della community e di divertirti insieme a loro.
            </p>
            <button class="btn btn-outline-light" type="button" onclick="window.location.href = 'https://discord.gg/5gD6bk52'"> Parliamo </button>
          </div>
        </div>
        <div class="col-md-6 mobile">
          <div class=" animationbump h-100 p-5 text-light border rounded-3 bg-github">
            <h2 class="livetext" ><i class="ri-github-fill"></i> GitHub</h2>
            <p> La nostra repository GitHub è un luogo in cui puoi costruire relazioni professionali
              e connetterti con persone che condividono la tua passione per la programmazione.
              Potrai creare una rete di contatti nel settore, trovare mentori e potenziali collaboratori per futuri progetti.
            </p>
            <button class="btn btn-outline-secondary" type="button" onclick="window.location.href = 'https://github.com/nannipy/dividebyzero.git'"> La nostra repository </button>
          </div>
        </div>
      </div>
      <div>
        <p>

        </p>
      </div>
      <div class="row align-items-md-stretch" style="margin:auto">
        <div class="col-md-6">
          <div class=" animationbumpopposite h-100 p-5 bg-reddit rounded-3 text-light">
            <h2 class="livetext"><i class="ri-reddit-fill"></i> Reddit</h2>
            <p> Il nostro subreddit è un ambiente accogliente e inclusivo. Promuoviamo il rispetto reciproco e
              incoraggiamo tutti i membri a partecipare alle discussioni in modo costruttivo e civile.
              Potrai imparare da diverse prospettive, ottenere consigli, scoprire nuove idee e interagire con
              persone provenienti da diverse esperienze di vita e culture.
            </p>
            <button class="btn btn-outline-light" type="button" onclick="window.location.href = 'https://www.reddit.com/r/divide_by_zero/'"> Redditata </button>
          </div>
        </div>
        <div class="col-md-6 mobile">
          <div class=" animationbump h-100 p-5 bg-body-tertiary border rounded-3">
            <h2 class="livetext"><i class="ri-instagram-line"></i>Instagram</h2>
            <p> La nostra community su Instagram è anche impegnata nel fornire contenuti utili e informativi.
              Potrai trovare consigli pratici, guide, suggerimenti e trucchi relativi ai tuoi interessi specifici.
              Inoltre, potremmo organizzare sessioni di domande e risposte, in cui potrai porre le tue domande
              direttamente ai nostri esperti o influencer di settore.
            </p>
            <button class="btn btn-outline-secondary" type="button" onclick="window.location.href = 'https://www.instagram.com/dividebyzero.community/'">Seguici</button>
          </div>
        </div>
      </div>
      <div>
        <p>
            
        </p>
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
</html>
