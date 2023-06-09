<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />


    <link rel="stylesheet" href="style.css" />
    <!-- <link rel="stylesheet" href="css/general.css" /> -->
    <title>Voto</title>
  </head>
  <body>
    <header class="container header">
      <div class="logo-box">
        <a href="http://localhost/sam/home.php"
          ><img class="logo" src="logo-removebg-preview.png" alt="logo"
        /></a>
        <a href="http://localhost/sam/home.php" class="logo-name"><p>Voto</p></a>
      </div>
      <nav class="main-nav">
        <ul class="main-nav-list">
          <li><a class="main-nav-link nav" href="http://localhost/sam/home.php">Home</a></li>
          <li><a class="main-nav-link nav" href="#">About</a></li>
          <!-- <li>
            <a class="main-nav-link nav" href="voter_or_candidate.html"
              >Choose</a
            >
          </li> -->
          <li>
            <a class="main-nav-link nav" href="http://localhost/sam/result.php">Results</a>
          </li>
        </ul>
      </nav>
      <div class="cta-box">
        <a class="btn login-btn" href="http://localhost/sam/login.php">Login</a>
        <a class="btn sign-up-btn" href="http://localhost/sam/signup.php">Sign up</a>
      </div>
    </header>
    <main>
      <section class="section-hero">
        <div class="container">
          <h1 class="heading-primary">
            A new way to do <span> Event voting online</span>
          </h1>
          <p class="hero-text">
            Voto is a online voting tool that helps you to condect voting for
            college events in a easy and a secure way.
          </p>
          <a class="btn get-started-btn" href="http://localhost/sam/signup.php">Get started</a>
        </div>
      </section>
      <section class="event-preview container">
        <img class="event_preview_img" src="img/event_preview.png" alt="" />
      </section>
      <section class="section-about container">
        <div class="grid grid-col--2">
          <div class="about--text-box">
            <h2 class="heading-primary">About <span>Voto</span></h2>
            <p class="about--text">
              Welcome to our online voting platform Voto, where democracy
              thrives! Exercise your civic duty and cast your vote securely and
              conveniently from the comfort of your home. Your voice matters!"
            </p>
            <a class="btn sign-up-btn" href="http://localhost/sam/signup.php">Start using &gt;</a>
          </div>
          <div class="about--text-box">
            <img class="about--img" src="/img/about-img.jpg" alt="" />
          </div>
        </div>
      </section>
    </main>

    <footer class="footer">
      <div class="container header">
        <div class="logo-box">
          <a href="http://localhost/sam/home.php"
            ><img class="logo" src="logo-removebg-preview.png" alt="logo"
          /></a>
          <a href="http://localhost/sam/home.php" class="logo-name"><p>Voto</p></a>
        </div>
        <nav class="main-nav">
          <ul class="main-nav-list">
            <li>
              <a class="main-nav-link footer-link" href="#">Add Events</a>
            </li>
            <li><a class="main-nav-link footer-link" href="#">Something</a></li>
            <li><a class="main-nav-link footer-link" href="#">About</a></li>
            <li><a class="main-nav-link footer-link" href="#">Pricing</a></li>
          </ul>
        </nav>
      </div>
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>