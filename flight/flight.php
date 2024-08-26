<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  echo "<script>alert('Kindly LogIn to See Available Fligts');</script>";
  header("location: login.php");
  exit;
} else {
  $date = $_SESSION['date'];
  $date = DateTIme::createFromFormat('Y-m-d', $date);
  $year = $date->format('Y');
  $month = substr($date->format('F'), 0, 3);
  $day = $date->format('d');



  $date_string = $_SESSION['date'];
  $timestamp = strtotime($date_string);
  $day_number = date('w', $timestamp);
  $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  $day_name = $days[$day_number];
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="flight1.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css?family=Cabin|Indie+Flower|Inknut+Antiqua|Lora|Ravi+Prakash"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <title>Available Flights</title>
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
        <a href="#" style="color: #fff;"><i class="fa-solid fa-user"></i></a>
        <?php
        echo "<span><a href='userdash.php' style='color: white;'>" . $_SESSION['fullname'] . "</a></span>";
        ?>
      </div>
      <nav class="navigation">
        <a href="index.php">Home</a>
        <a href="about.html">About</a>
        <a href="contact.html">Contact</a>
        <button class="btnLogin-popup" onclick="window.location.href = 'index.html'">
          Log Out
        </button>
      </nav>
    </div>
  </header>
  <div class="content">
    <div class="container">
      <h1 class="upcomming">Available Flights</h1>
      <div class="item">
        <div class="item-right">
          <h2 class="num">
            <?php
            echo "" . $day;
            ?>
          </h2>
          <p class="day">
            <?php
            echo "" . $month;
            ?>
          </p>
          <span class="up-border"></span>
          <span class="down-border"></span>
        </div>
        <div class="item-left">
          <p class="event">
            <?php
            echo "" . $_SESSION['fromcity'];
            ?> - <?php
             echo "" . $_SESSION['tocity'];
             ?>
          </p>
          <h2 class="title">
            <?php
            echo "" . $_SESSION['date'];
            ?>
          </h2>

          <div class="sce">
            <div class="icon">
              <i class="fa fa-table"></i>
            </div>
            <p>
              <?php
              echo "" . $day_name
                ?> , <br />
              9:00 AM <br>
              Boarding Closes at 9:20 AM
            </p>
          </div>
          <div class="fix"></div>
          <div class="loc">
            <div class="icon">
              <i class="fa-solid fa-ticket"></i>
            </div>
            <p>Ticket Type :
              <?php
              echo "" . $_SESSION['ticket'];
              ?>
            </p>
          </div>
          <div class="fix"></div>
          <button class="tickets" onclick="window.location.href= 'ticket.php'">Book Now</button>
        </div>
      </div>
      <div class="item">
        <div class="item-right">
          <h2 class="num">
            <?php
            echo "" . $day;
            ?>
          </h2>
          <p class="day">
            <?php
            echo "" . $month;
            ?>
          </p>
          <span class="up-border"></span>
          <span class="down-border"></span>
        </div>
        <div class="item-left">
          <p class="event">
            <?php
            echo "" . $_SESSION['fromcity'];
            ?> - <?php
             echo "" . $_SESSION['tocity'];
             ?>
          </p>
          <h2 class="title">
            <?php
            echo "" . $_SESSION['date'];
            ?>
          </h2>

          <div class="sce">
            <div class="icon">
              <i class="fa fa-table"></i>
            </div>
            <p>
              <?php
              echo "" . $day_name
                ?> ,<br />
              11:00 AM <br>
              Boarding Closes at 11:20 AM
            </p>
          </div>
          <div class="fix"></div>
          <div class="loc">
            <div class="icon">
              <i class="fa-solid fa-ticket"></i>
            </div>
            <p>Ticket Type :
              <?php
              echo "" . $_SESSION['ticket'];
              ?>
            </p>
          </div>
          <div class="fix"></div>
          <button class="tickets" onclick="window.location.href= 'ticket.php'">Book Now</button>
        </div>
        <!-- end item-right -->
      </div>
      <!-- end item -->

      <div class="item">
        <div class="item-right">
          <h2 class="num">
            <?php
            echo "" . $day;
            ?>
          </h2>
          <p class="day">
            <?php
            echo "" . $month;
            ?>
          </p>
          <span class="up-border"></span>
          <span class="down-border"></span>
        </div>
        <!-- end item-right -->

        <div class="item-left">
          <p class="event">
            <?php
            echo "" . $_SESSION['fromcity'];
            ?> - <?php
             echo "" . $_SESSION['tocity'];
             ?>
          </p>
          <h2 class="title">
            <?php
            echo "" . $_SESSION['date'];
            ?>
          </h2>

          <div class="sce">
            <div class="icon">
              <i class="fa fa-table"></i>
            </div>
            <p>
              <?php
              echo "" . $day_name
                ?> ,<br />
              9:00 PM <br>
              Boarding Closes at 9:20 PM
            </p>
          </div>
          <div class="fix"></div>
          <div class="loc">
            <div class="icon">
              <i class="fa-solid fa-ticket"></i>
            </div>
            <p>Ticket Type :
              <?php
              echo "" . $_SESSION['ticket'];
              ?>
            </p>
          </div>
          <div class="fix"></div>
          <button class="tickets" onclick="window.location.href= 'ticket.php'">Book Now</button>
        </div>
        <!-- end item-right -->
      </div>
      <!-- end item -->

      <div class="item">
        <div class="item-right">
          <h2 class="num">
            <?php
            echo "" . $day;
            ?>
          </h2>
          <p class="day">
            <?php
            echo "" . $month;
            ?>
          </p>
          <span class="up-border"></span>
          <span class="down-border"></span>
        </div>
        <!-- end item-right -->

        <div class="item-left">
          <p class="event">
            <?php
            echo "" . $_SESSION['fromcity'];
            ?> - <?php
             echo "" . $_SESSION['tocity'];
             ?>
          </p>
          <h2 class="title">
            <?php
            echo "" . $_SESSION['date'];
            ?>
          </h2>

          <div class="sce">
            <div class="icon">
              <i class="fa fa-table"></i>
            </div>
            <p>
              <?php
              echo "" . $day_name
                ?> ,<br />
              11:00 PM <br>
              Boarding Closes at 11:20 PM
            </p>
          </div>
          <div class="fix"></div>
          <div class="loc">
            <div class="icon">
              <i class="fa-solid fa-ticket"></i>
            </div>
            <p>Ticket Type :
              <?php
              echo "" . $_SESSION['ticket'];
              ?>
            </p>
          </div>
          <div class="fix"></div>
          <button class="tickets" onclick="window.location.href= 'ticket.php'">Book Now</button>
        </div>
        <!-- end item-right -->
      </div>
      <!-- end item -->
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
</body>

</html>