<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'database.php';
    $userName = $_POST["userName"];
    $password = $_POST["password"]; 
    
    
    // $sql = "Select * from registration where userName='$userName' AND password='$hashedPassword'";
    $sql = "Select * from registration where userName='$userName'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    
    $fullName = ucfirst($row['firstName']) . ' ' . ucfirst($row['lastName']);
    // $num = mysqli_num_rows($result);
    if ($row){
      if (password_verify($password, $row['password'])) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $userName;
        $_SESSION['fullname'] = $fullName;
        $_SESSION['firstname'] = $row['firstName'];
        $_SESSION['lastname'] = $row['lastName'];
        $_SESSION['email'] = $row['email'];
        header("location: index.php");
      }
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login1.css" />
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
    <div class="body">
      <div class="wrapper">
        <span class="icon-close"
          ><ion-icon
            name="close-circle-outline"
            onclick="window.location.href = 'index.html'"
          ></ion-icon
        ></span>
        <div class="form-box login">
          <h2>Login</h2>
          <form action="login.php" method="POST">
            <div class="input-box">
              <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
              <input type="text" id="email" required name="userName" autocomplete="on"/>
              <label for="userName">User Name</label>
            </div>
            <div class="input-box">
              <a id="lockIcon"><ion-icon name="lock-closed"></ion-icon></a>
              <a id="lockIconn"><ion-icon name="lock-open"></ion-icon></a>
              <input type="password" id="password" required name="password" autocomplete="off"/>
              <label for="password">Password</label>
            </div>
            <div class="remember-forgot">
              <a href="#">Forgot Password?</a>
            </div>
            <div class="terms-and-conditions">
              <label
                ><input type="checkbox" id="terms" required />I agree to
                the</label
              >
              <a href="terms.html">Terms and Conditions</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="login-register">
              <p>
                Don't have an account?
                <a class="register-link" href="register.html">Sign Up</a>
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
    <script src="login.js"></script>
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
