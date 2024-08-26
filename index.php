<?php


session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}


$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'database.php';
  $fromcity = $_POST["fromcity"];
  $tocity = $_POST["tocity"];
  $timeDepart = $_POST["timeDepart"];
  $timeArival = $_POST["timeArival"];
  $adult = $_POST["adult"];
  $children = $_POST["children"];
  $ticket = $_POST["ticket"];

  $_SESSION['date'] = $timeDepart;
  $_SESSION['ticket'] = $ticket;
  $_SESSION['tocity'] = $tocity;
  $_SESSION['fromcity'] = $fromcity;

  $date_string = $timeDepart;
  $timestamp = strtotime($date_string);
  $day_number = date('w', $timestamp);
  $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  $day_name = $days[$day_number];
  $_SESSION['day'] = $day_name;




  $conn = new mysqli('localhost', 'root', '', 'forminfo');
  if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
  } else {
    header("location: flight.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>airTicket Reservation</title>
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
        <a href="userdash.php"><i class="fa-solid fa-user"></i></a>
        <?php
        echo "<span style='color: white;'><a href='userdash.php'>" . $_SESSION['fullname'] . "</a></span>";
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
  <div id="mySidenav" class="sidenav">
    <a href="todo.html" id="contact">To-do List</a>
  </div>
  <div class="section__container header__container header">
    <h1 class="section__header">Find And Book<br />A Great Experience</h1>
    <div class="hImg">
      <img src="Images/header.jpg" alt="header" />
    </div>
  </div>
  <div class="body">
    <form class="content" action="index.php" method="POST">
      <div class="logocontent">
        <div class="logoc"></div>
      </div>
      <h2>Book A Ticket</h2>
      <div class="ticketBooking">
        <h3>From</h3>
        <select id="sell" name="fromcity">
          <option disabled selected hidden>Select</option>
          <option value="Islamabad">Islamabad</option>
          <option value="Fasailabad">Faisalabad</option>
          <option value="Karachi">Karachi</option>
          <option value="Peshawar">Peshawar</option>
          <option value="Multan">Multan</option>
          <option value="Lahore">Lahore</option>
          <option value="Skardu">Skardu</option>
          <option value="Gilgit">Gilgit</option>
          <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
          <option value="Rahim Yar Khan">Rahim Yar Khan</option>
          <option value="Quetta">Quetta</option>
          <option value="Gujrat">Gujrat</option>
          <option value="Bhawalpur">Bhawalpur</option>
          <option value="Turbat">Turbat</option>
          <option value="Dera Ismail Khan">Dera Ismail Khan</option>
          <option value="Multan">Multan</option>
          <option value="Abbottabad">Abbottabad</option>
          <option value="Sukkur">Sukkur</option>
          <option value="Gwadar">Gwadar</option>
        </select>
        <h3>To</h3>
        <select id="sell" name="tocity">
          <option disabled selected hidden>Select</option>
          <option value="Islamabad">Islamabad</option>
          <option value="Fasailabad">Faisalabad</option>
          <option value="Karachi">Karachi</option>
          <option value="Peshawar">Peshawar</option>
          <option value="Multan">Multan</option>
          <option value="Lahore">Lahore</option>
          <option value="Skardu">Skardu</option>
          <option value="Gilgit">Gilgit</option>
          <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
          <option value="Rahim Yar Khan">Rahim Yar Khan</option>
          <option value="Quetta">Quetta</option>
          <option value="Gujrat">Gujrat</option>
          <option value="Bhawalpur">Bhawalpur</option>
          <option value="Turbat">Turbat</option>
          <option value="Dera Ismail Khan">Dera Ismail Khan</option>
          <option value="Multan">Multan</option>
          <option value="Abbottabad">Abbottabad</option>
          <option value="Sukkur">Sukkur</option>
          <option value="Gwadar">Gwadar</option>
        </select>
      </div>
      <div class="timing">
        <h3>Departure Time</h3>
        <input type="date" name="timeDepart" />
        <h3>Return Time</h3>
        <input type="date" name="timeArival" />
      </div>
      <div class="personalDetails">
        <div class="passengers">
          <h4>Passengers</h4>
          <input type="number" placeholder="Adults" name="adult" />
          <input type="number" placeholder="Childrens" name="children" />
        </div>
        <h3>Ticket Class</h3>
        <select id="sell" name="ticket">
          <option selected disabled hidden>Ticket Type</option>
          <option>All</option>
          <option>Economy</option>
          <option>Business</option>
          <option>First Class</option>
        </select>
      </div>
      <div class="available">
        <button type="submit" name="search" class="searchFlightbtn">
          Search Flights
        </button>
      </div>
    </form>
  </div>
  <div class="content2">
    <h2>Top Places to Visit</h2>
    <div class="cardingroup1">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="Images/Locations/skardu.jpg" alt="Ava" style="width: 400px; height: 300px" />
          </div>
          <div class="flip-card-back back1">
            <h1>SKARDU</h1>
          </div>
        </div>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="Images/Locations/location-1.jpg" alt="Avatar" style="width: 400px; height: 300px" />
          </div>
          <div class="flip-card-back back2">
            <h1>ISLAMABAD</h1>
          </div>
        </div>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="Images/Locations/gilgit.jpg" alt="Avatar" style="width: 400px; height: 300px" />
          </div>
          <div class="flip-card-back back3">
            <h1>GILGIT</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="topmonth">
    <section class="section__container travellers__container">
      <h2 class="section__header">Best travellers of the month</h2>
      <div class="travellers__grid">
        <div class="travellers__card">
          <img src="Images/Locations/location-2.jpg" alt="traveller" />
          <div class="travellers__card__content">
            <img src="assets/client-1.jpg" alt="client" />
            <h4>Emily Johnson</h4>
            <p>Islamabad,Muree</p>
          </div>
        </div>
        <div class="travellers__card">
          <img src="Images/Locations/location-1.jpg" alt="traveller" />
          <div class="travellers__card__content">
            <img src="assets/client-2.jpg" alt="client" />
            <h4>David Smith</h4>
            <p>Islamabad</p>
          </div>
        </div>
        <div class="travellers__card">
          <img src="Images/Locations/location-3.jpg" alt="traveller" />
          <div class="travellers__card__content">
            <img src="assets/client-3.jpg" alt="client" />
            <h4>Olivia Brown</h4>
            <p>Skardu</p>
          </div>
        </div>
        <div class="travellers__card">
          <img src="Images/Locations/location-4.jpg" alt="traveller" />
          <div class="travellers__card__content">
            <img src="assets/client-4.jpg" alt="client" />
            <h4>Daniel Taylor</h4>
            <p>Gilgit</p>
          </div>
        </div>
      </div>
    </section>
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