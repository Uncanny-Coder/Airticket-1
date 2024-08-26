<?php
$showError = false;
$showAlert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'database.php';
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    

    session_start();
    $_SESSION['username'] = $userName;

    $existSql = "Select * from registration where userName='$userName'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    $existSql1 = "Select * from registration where email='$email'";
    $result1 = mysqli_query($conn, $existSql1);
    $numExistRows1 = mysqli_num_rows($result1);
    if($numExistRows > 0 || $numExistRows1 > 0){
        $showError = "Username or Email Already Exists";
    }
    else{
      $stmt = $conn->prepare("insert into registration(firstName, lastName, userName, email, password) values(?, ?, ?, ?, ?)");
		  $stmt->bind_param("sssss", $firstName, $lastName, $userName, $email, $hashedPassword);
		  $execval = $stmt->execute();
      $showAlert = "We Successfully Created Your Account You May <a href='login.php' style='font-size: 1.4rem; color: #fff;'>Login Now</a>";
		  $stmt->close();
		  $conn->close();
     }
  }
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="register.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>airTicket Reservation</title>
  </head>
  <body>
    <header>
      <div class="navbar">
        <div class="nav-left">
          <div class="navlogo">
            <a href="index.html" class="logo"></a>
          </div>
        </div>
        <nav class="navigation">
          <a href="index.html">Home</a>
          <a href="about.html">About</a>
          <a href="contact.html">Contact</a>
          <button
            class="btnLogin-popup"
            onclick="window.location.href = 'login.html'"
          >
            Login
          </button>
        </nav>
      </div>
    </header>
    <?php
    if($showError){
        echo '<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display=`none`;"
      >&times;</span
    >
    <strong>Opps!</strong> '.$showError.'
  </div>';
    }
    ?>
    <?php
    if($showAlert){
        echo '<div class="alert1" style="z-index: 100; padding: 20px; background-color: rgba(41, 121, 41, 0.7); color: white;">
    <span class="closebtn" onclick="this.parentElement.style.display=`none`;"
      >&times;</span
    >
    <strong>Success!</strong> '.$showAlert.'
  </div>';
    }
    ?>
    <div class="body">
      <div class="wrapper">
        <span class="icon-close"
          ><ion-icon
            name="close-circle-outline"
            onclick="window.location.href = 'index.html'"
          ></ion-icon
        ></span>
        <div class="form-box login">
          <h2>Sign Up</h2>
          <form action="register.php" method="POST">
            <div class="first">
              <div class="input-box">
                <span class="icon"><ion-icon name="document"></ion-icon></span>
                <input type="text" id="firstName" name="firstName" required />
                <label for="firstName">First Name</label>
              </div>
              <div class="input-box boxNext">
                <span class="icon"><ion-icon name="document"></ion-icon></span>
                <input type="text" id="lastName" name="lastName" required />
                <label for="lastName">Last Name</label>
              </div>
            </div>
            <div class="second">
              <div class="input-box">
                <span class="icon"
                  ><ion-icon name="person-circle-outline"></ion-icon
                ></span>
                <input type="text" id="username" name="userName" required />
                <label for="username">Username</label>
              </div>
              <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" id="email" name="email" required />
                <label for="email">Email</label>
              </div>
            </div>
            <div class="third">
              <div class="input-box">
                <a id="lockIcon"><ion-icon name="lock-closed"></ion-icon></a>
                <a id="lockIconn"><ion-icon name="lock-open"></ion-icon></a>
                <input type="password" id="password" name="password" required />
                <label for="password">Password</label>
              </div>
            </div>
            <div class="terms-and-conditions">
              <label
                ><input type="checkbox" id="terms" required />I agree to
                the</label
              >
              <a href="terms.html">Terms and Conditions</a>
            </div>
            <button type="submit" class="btn" name="signUp">Sign Up</button>
            <div class="login-register">
              <p>
                Already registered?
                <a class="register-link" href="login.html">Sign In</a>
              </p>
            </div>
          </form>
        </div>
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
            <li><a href="index.html">Home</a></li>
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
    <script src="register.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>