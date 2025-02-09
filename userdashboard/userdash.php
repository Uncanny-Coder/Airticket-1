<?php
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
      header("location: login.php");
      exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>AirTicket UserDashboard</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="userdash.css" />
  </head>
  <body>
  <header>
  <div class="navbar">
        <div class="nav-left">
          <div class="navlogo">
            <a href="index.php" class="logo"></a>
          </div>
        </div>
        <div class="accountuser">
          <a href="userdash.php" style='color: white;'><i class="fa-solid fa-user"></i></a>
          <?php
          echo "<span><a href='userdash.php' style='color: white;'>".$_SESSION['fullname']."</a></span>";
          ?>
        </div>
        <nav class="navigation">
          <a href="index.php">Home</a>
          <a href="about.html">About</a>
          <a href="contact.html">Contact</a>
          <button
            class="btnLogin-popup"
            onclick="window.location.href = 'logout.php'"
          >
            Log Out
          </button>
        </nav>
      </div>
    </header>
    <!-- partial:index.partial.html -->
     <div class="body">
      <div class="site-wrap">
        <nav class="site-nav">
          <div class="name">
            <?php
            echo "<i class='fa-solid fa-user'></i>  ". $_SESSION["fullname"];
            ?>
          </div>
  
          <ul>
            <li><a href="userdash.php">Manage You Account</a></li>
            <li><a href="userticket.php">Your Flights</a></li>
          </ul>
  
          <button
            class="btnLogin-popup btnp1"
            onclick="window.location.href = 'logout.php'"
          >
            Log Out
          </button>
        </nav>
  
        <main>
          <div class="header">
            <div class="breadcrumbs">
              <a href="index.php">Home</a>
            </div>
  
            <h1 class="title"><?php
            echo "<span>Hello,</span> ". $_SESSION['firstname'];
            ?></h1>
            <nav class="nav-tabs" id="nav-tabs">
              <a href="userdash.php" class="active"> Account </a>
            </nav>
          </div>
  
          <div class="content-columns" style='height: 60vh;'>
            <div class="account-info">
              <h2 style='font-weight: 1000; font-size: 2rem; margin: 30px;';">Account Information</h2>
              <div class="info-item">
                <label for="name" style="font-weight: 600; margin: 15px;">Name </label>
                <span style="margin-left: 4.4rem;"><?php echo $_SESSION['fullname'];?></span>
              </div>
              <div class="info-item">
                <label for="email" style="font-weight: 600; margin: 15px;">Email</label>
                <span style="margin-left: 4.6rem;"><?php echo $_SESSION['email'];?></span>
              </div>
              <div class="info-item">
                <label for="username" style="font-weight: 600; margin: 15px;">Username</label>
                <span style="margin-left: 1.4rem;"><?php echo $_SESSION['username'];?></span>
              </div>
              <div class="info-item" style="font-weight: 600;">
                <label for="phone" style="font-weight: 600; margin: 15px;">Password</label>
                <span style="margin-left: 2rem;">********</span>
              </div>
              <button onclick="window.location.href = 'useraccedit.php'" class="btnedit" style="margin: 2rem;">Edit</button>
            </div>
          </div>
        </main>
      </div>
     </div>
     <footer>
      <div class="footerContainer">
        <div class="socialIcons">
          <a href="https://www.facebook.com/"
            ><i class="fa-brands fa-facebook"></i
          ></a>
          <a href="https://www.instagram.com/?hl=en"
            ><i class="fa-brands fa-instagram"></i
          ></a>
          <a href="https://twitter.com/"
            ><i class="fa-brands fa-twitter"></i
          ></a>
          <a href="https://www.google.com/"
            ><i class="fa-brands fa-google-plus"></i
          ></a>
          <a href="https://www.youtube.com/"
            ><i class="fa-brands fa-youtube"></i
          ></a>
        </div>
        <div class="footerNav">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="blogs.html">Blogs</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact Us</a></li>
          </ul>
        </div>
      </div>
      <div class="footerBottom">
        <p>Copyright &copy;2024,airticket, Inc. or its affiliates</p>
      </div>
    </footer>
    <script src="userdash.js"></script>
  </body>
</html>
