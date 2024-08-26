<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>AirTicket UserDashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        echo "<span><a href='userdash.php' style='color: white;'>" . $_SESSION['fullname'] . "</a></span>";
        ?>
      </div>
      <nav class="navigation">
        <a href="index.php">Home</a>
        <a href="about.html">About</a>
        <a href="contact.html">Contact</a>
        <button class="btnLogin-popup" onclick="window.location.href = 'logout.php'">
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
          echo "<i class='fa-solid fa-user'></i>  " . $_SESSION["fullname"];
          ?>
        </div>

        <ul>
          <li><a href="userdash.php">Manage You Account</a></li>
          <li><a href="userticket.php">Your Flights</a></li>
        </ul>

        <button class="btnLogin-popup btnp1" onclick="window.location.href = 'logout.php'">
          Log Out
        </button>
      </nav>

      <main>
        <div class="header">
          <div class="breadcrumbs">
            <a href="index.php">Home</a>
          </div>

          <h1 class="title"><?php
          echo "<span>Hello,</span> " . $_SESSION['firstname'];
          ?></h1>
          <nav class="nav-tabs" id="nav-tabs">
            <a href="#0" class="active"> My Flights </a>
          </nav>
        </div>

        <div class="content-columns" style='height: 60vh;'>
          <div class="ticket">
            <label for="city" style="font-size: 2.5rem; font-weight: 700; ">From :</label>
            <span style="font-size: 2.5rem; font-weight: 400;"><?php echo "" . $_SESSION['fromcity'] ?></span>
            <br>
            <label for="city" style="font-size: 2.5rem; font-weight: 700; ">To :</label>
            <span style="font-size: 2.5rem; font-weight: 400;"><?php echo "" . $_SESSION['tocity'] ?></span>
            <br>
            <label for="date" style="font-size: 2.5rem; font-weight: 700; ">TimeDeparture :</label>
            <span style="font-size: 2.5rem; font-weight: 400;"><?php echo "" . $_SESSION['date'] ?></span>
            <br>
            <label for="date" style="font-size: 2.5rem; font-weight: 700; ">Day :</label>
            <span style="font-size: 2.5rem; font-weight: 400;"><?php echo "" . $_SESSION['day'] ?></span>
            <br>
            <label for="ticket" style="font-size: 2.5rem; font-weight: 700; ">Ticket Type :</label>
            <span style="font-size: 2.5rem; font-weight: 400;"><?php echo "" . $_SESSION['ticket'] ?></span>
          </div>
        </div>
      </main>
    </div>
  </div>
  <footer>
    <div class="footerContainer">
      <div class="socialIcons">
        <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://www.instagram.com/?hl=en"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
        <a href="https://www.google.com/"><i class="fa-brands fa-google-plus"></i></a>
        <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
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