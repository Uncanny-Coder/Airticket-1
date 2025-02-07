<?php
session_start();

$showAlert = false;
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
} else {
  $showAlert = "Your Ticket is Booked and You may See <a href='userticket.php' style='font-size: 1.1rem; color: #fff;'>Your Tickets</a>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>AirTicket Tickets</title>
  <link rel="stylesheet" href="ticket1.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header>
    <div class="navbar1">
      <div class="nav-left0">
        <div class="navlogo">
          <a href="index.php" class="logo"></a>
        </div>
      </div>
      <nav class="navigation">
        <a href="index.php">Home</a>
        <a href="about.html">About</a>
        <a href="contact.html">Contact</a>
      </nav>
    </div>
    <div class="navbar0">
      <div class="nav-left0">
        <div class="navlogo">
          <a href="index.php" class="logo"></a>
        </div>
      </div>
      <nav class="navigation">
        <a href="index.php">Home</a>
        <a href="about.html">About</a>
        <a href="contact.html">Contact</a>
        <button class="btnLogin-popup" onclick="window.location.href = 'login.php'">
          Login
        </button>
      </nav>
    </div>
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
  </header>
  <?php
  if ($showAlert) {
    echo '<div class="alert1" style="z-index: 100; padding: 20px; background-color: rgba(41, 121, 41, 0.7); color: white;">
    <span class="closebtn" onclick="this.parentElement.style.display=`none`;"
      >&times;</span
    >
    <strong>Horay!</strong> ' . $showAlert . '
  </div>';
  }
  ?>
  <div class="body">
    <main class="ticket-system">
      <div class="top">
        <h1 class="title" style="font-size: 2.5rem;">Your Flights</h1>
        <div class="printer">
        </div>
        <div class="receipts-wrapper">
          <div class="receipts">
            <div class="receipt">
              <div class="logoreceipt">
                <h3>AirTicket Reservation</h3>
              </div>
              <div class="route">
                <h2>
                  <?php
                  echo "" . $_SESSION['fromcity'];
                  ?>
                </h2>
                <svg class="plane-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 510 510">
                  <path fill="#3f32e5"
                    d="M497.25 357v-51l-204-127.5V38.25C293.25 17.85 275.4 0 255 0s-38.25 17.85-38.25 38.25V178.5L12.75 306v51l204-63.75V433.5l-51 38.25V510L255 484.5l89.25 25.5v-38.25l-51-38.25V293.25l204 63.75z" />
                </svg>
                <h2>
                  <?php
                  echo "" . $_SESSION['tocity'];
                  ?>
                </h2>
              </div>
              <div class="details">
                <div class="item">
                  <span>Passanger</span>
                  <h3><?php
                  echo "" . $_SESSION['fullname'];
                  ?></h3>
                </div>
                <div class="item">
                  <span>Flight No.</span>
                  <h3>PK6969</h3>
                </div>
                <div class="item">
                  <span>Departure</span>
                  <h3><?php
                  echo "" . $_SESSION['date'];
                  ?></h3>
                </div>
                <div class="item" style="margin: 0 10px 0 10px;">
                  <span>Ticket Type</span>
                  <h3 style="font-size: 1.5em;"><?php
                  echo "" . $_SESSION['ticket'];
                  ?></h3>
                </div>
                <div class="item">
                  <span>Airway</span>
                  <h3 style="font-size: 1.5em;"> PIA</h3>
                </div>
                <div class="item">
                  <span>Seat</span>
                  <h3>28A</h3>
                </div>
              </div>
            </div>
            <div class="receipt qr-code">
              <svg class="qr" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29.938 29.938">
                <path
                  d="M7.129 15.683h1.427v1.427h1.426v1.426H2.853V17.11h1.426v-2.853h2.853v1.426h-.003zm18.535 12.83h1.424v-1.426h-1.424v1.426zM8.555 15.683h1.426v-1.426H8.555v1.426zm19.957 12.83h1.427v-1.426h-1.427v1.426zm-17.104 1.425h2.85v-1.426h-2.85v1.426zm12.829 0v-1.426H22.81v1.426h1.427zm-5.702 0h1.426v-2.852h-1.426v2.852zM7.129 11.406v1.426h4.277v-1.426H7.129zm-1.424 1.425v-1.426H2.852v2.852h1.426v-1.426h1.427zm4.276-2.852H.002V.001h9.979v9.978zM8.555 1.427H1.426v7.127h7.129V1.427zm-5.703 25.66h4.276V22.81H2.852v4.277zm14.256-1.427v1.427h1.428V25.66h-1.428zM7.129 2.853H2.853v4.275h4.276V2.853zM29.938.001V9.98h-9.979V.001h9.979zm-1.426 1.426h-7.127v7.127h7.127V1.427zM0 19.957h9.98v9.979H0v-9.979zm1.427 8.556h7.129v-7.129H1.427v7.129zm0-17.107H0v7.129h1.427v-7.129zm18.532 7.127v1.424h1.426v-1.424h-1.426zm-4.277 5.703V22.81h-1.425v1.427h-2.85v2.853h2.85v1.426h1.425v-2.853h1.427v-1.426h-1.427v-.001zM11.408 5.704h2.85V4.276h-2.85v1.428zm11.403 11.405h2.854v1.426h1.425v-4.276h-1.425v-2.853h-1.428v4.277h-4.274v1.427h1.426v1.426h1.426V17.11h-.004zm1.426 4.275H22.81v-1.427h-1.426v2.853h-4.276v1.427h2.854v2.853h1.426v1.426h1.426v-2.853h5.701v-1.426h-4.276v-2.853h-.002zm0 0h1.428v-2.851h-1.428v2.851zm-11.405 0v-1.427h1.424v-1.424h1.425v-1.426h1.427v-2.853h4.276v-2.853h-1.426v1.426h-1.426V7.125h-1.426V4.272h1.426V0h-1.426v2.852H15.68V0h-4.276v2.852h1.426V1.426h1.424v2.85h1.426v4.277h1.426v1.426H15.68v2.852h-1.426V9.979H12.83V8.554h-1.426v2.852h1.426v1.426h-1.426v4.278h1.426v-2.853h1.424v2.853H12.83v1.426h-1.426v4.274h2.85v-1.426h-1.422zm15.68 1.426v-1.426h-2.85v1.426h2.85zM27.086 2.853h-4.275v4.275h4.275V2.853zM15.682 21.384h2.854v-1.427h-1.428v-1.424h-1.427v2.851zm2.853-2.851v-1.426h-1.428v1.426h1.428zm8.551-5.702h2.853v-1.426h-2.853v1.426zm1.426 11.405h1.427V22.81h-1.427v1.426zm0-8.553h1.427v-1.426h-1.427v1.426zm-12.83-7.129h-1.425V9.98h1.425V8.554z" />
              </svg>
              <div class="description">
                <h2><?php
                echo "" . $_SESSION['fullname'];
                ?>
                </h2>
                <p>Show QR-code when requested</p>
              </div>
            </div>
          </div>
        </div>
    </main>
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
</body>

</html>