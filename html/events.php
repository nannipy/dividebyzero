<!--  
    events.php
      Pagina per la visualizzazione degli eventi programmati. Gli annunci vengono generati automaticamente
      attingendo alle informazioni riportate su un'apposita tabella 'events' del database da impostare precedentemente
      ma che permette una gestione degli eventi semplice e pratica. Da segnalare anche l'utilizzo di un file ajax per
      una visualizzazione più approfondita delle informazioni relative l'evento di interesse.
-->

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Giovanni Pernazza & Alessandro Maone">
    <title>Divide by Zero</title>
    <link rel="icon" type="image/x-icon" href="../img/Logo_DBZ_red.png">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- icone -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css">
    
  </head>
  <body>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <!--banner di login-->
  <section class="home">
    <div class="form_container">
      <i class="ri-close-line form_close"></i>
      <!--Login-->
      <div class="form login_form">
        <form action="login.php" method="POST" name="login">
          <h2>Login</h2>
          
          <div class="input_box">
            <input type="email" placeholder="Enter your email" name="email" class="loginEmail" required />
            <i class="ri-mail-line email"></i>
          </div>
          
          <div class="input_box">
            <input type="password" placeholder="Enter your password" name="password" class="loginPassword" required />
            <i class="ri-lock-line password"></i>
            <i class="ri-eye-off-line pw_hide"></i>
          </div>

          <div class="option_field" name="checkbox">
            <span class="checkbox">
              <input type="checkbox" id="check">
              <label for="check">Remember me</label>
            </span>
          </div>

          <button class="btn btn-bd-primary button">Login Now</button>

          <div class="login_signup">
            Don't have an account? <a href="#" id="signup">Sign-up</a>
          </div>
        </form>
      </div>

      <!--Sign-up-->
      <div class="form signup_form">
        <form action="signup.php" method="POST" class="su_form" onsubmit="return validaForm();">
          <h2>Sign-up</h2>
          
          <div class="input_box email_field">
            <input type="email" placeholder="Enter your email" name="email" class="email" />
            <i class="ri-mail-line email"></i>
            <span class="error email-error">
              <i class="ri-error-warning-line error-icon"></i>
              <p class="error-text">Please enter a valid email</p>
            </span>
          </div>
          
          <div class="input_box create_psw">
            <input type="password" placeholder="Create password" name="password" class="password" />
            <i class="ri-lock-line password"></i>
            <i class="ri-eye-off-line pw_hide"></i>
            <span class="error password-error">
              <i class="ri-error-warning-line error-icon"></i>
              <p class="error-text">Please enter at least 8 character with number,
                symbol, small and capital letter.
              </p>
            </span>
          </div>
          
          <div class="input_box confirm_psw">
            <input type="password" placeholder="Confirm password" name="cpassword" class="cpassword" />
            <i class="ri-lock-line password"></i>
            <i class="ri-eye-off-line pw_hide"></i>
            <span class="error cpassword-error">
              <i class="ri-error-warning-line error-icon"></i>
              <p class="error-text">Password dont't match</p>
            </span>
          </div>

          <div class="option_field">
            <span class="checkbox">
              <input type="checkbox" id="checktc" name="checkbox" required>
              <label for="checktc">Accept terms and conditions</label>
            </span>
          </div>
          
          <input type="submit" value="Sign-up Now" class="btn btn-bd-primary button"></input>

          <div class="login_signup">
            Already have an account? <a href="#" id="login">Login</a>
          </div>
        </form>
      </div>
    </div>
  </section>
    
  <!--header pagine-->
  <header>
    <div class="hamburger">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </div>
    <a href="index.html" class="logo"><img class="logo_img" src="../img/Logo_DBZ_red.png" alt="100px" width="100px"> DIVIDE BY ZERO</a>
    <nav class="nav-bar">
      <ul>
        <li><a class="active" href="#">Eventi</a></li>
        <li><a href="community.html">Community</a></li>
        <li><a href="whoweare.html">Chi siamo</a></li>
      </ul>
    </nav>
    <div class="login">
      <a class="acc" id="login-open"><i class="ri-user-fill"></i>Login</a>
      <a class="vline">|</a>
      <a class="reg" id="signup-open">Sign Up</a>
    </div>
  </header>

  <!--sezione principale-->
  <main>
    <h2 style="text-align: center; justify-content: center; padding-top: 30px;"> <i class="ri-calendar-event-line"></i> Eventi </h2>

    <div class="event-container">

      <!--codice php per l'accesso alla tabella contenente tutti gli eventi in programma-->
      <?php
        include "dbconn_toevents.inc.php";
        $query = "SELECT *
                  FROM events";
        $result = mysqli_query($dbconn, $query);

        while($row = mysqli_fetch_array($result)) {
      ?>
      
      <!--visualizzazione del singolo evento iterata fino all'esaurimento della tabella di riferimento-->
      <div class="event">
        <div class="event-left">
          <div class="event-date">
            <div class="date"><?php echo $row['day']; ?></div>
            <div class="month"><?php echo $row['month']; ?></div>
          </div>
          <div class="event-image">
            <img src="<?php echo $row['image']; ?>" width="150" weight="150">
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
            
          <button data-id='<?php echo $row['id']; ?>' class="event-info">
            Info
          </button>
        </div>
      </div>
      <?php
      }
      mysqli_close($dbconn);
      ?>

      <!--modal per la visualizzazione delle informazioni dell'evento-->
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
      
      <!--chiamata del file ajax per la compilazione del modal-->
      <script type ="text/javascript">
        $(document).ready(function() {
          $(".event-info").click(function() {
            var eventid = $(this).data("id");
            $.ajax({
              url: "ajaxfile.php",
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
  
  <script src="../script.js"></script>

  <!--fondo pagina-->
  <footer class="py-5">
    <div class="row">
      <div class="col-6 col-md" style="text-align: center;">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="whoweare.html">Chi siamo</a></li>
          <li><a class="link-secondary" href="#">Privacy</a></li>
          <li><a class="link-secondary" href="#">Terms</a></li>
        </ul>
      </div>
      <div class="col-6 col-md" style="text-align: center;">
        <h5>Newsletter</h5>
        <br>
        <form action="newsletter.php" method="POST" name="newsletter" class="col-md" onsubmit="verificaForm();">
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
