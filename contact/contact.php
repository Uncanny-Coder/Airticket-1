<?php
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'database.php';
    $fullName = $_POST["fullName"];
    $Number = $_POST["Number"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $subject = $_POST["subject"];

    $stmt = $conn->prepare("insert into contact(fullName,Number,email,city,subject) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fullName, $Number, $email, $city, $subject);
    $execval = $stmt->execute();
    $showAlert = "Form Submitted :)";
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="contact.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Contact Us</title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="nav-left">
                <div class="navlogo">
                    <a href="/airticket/index.php" class="logo"></a>
                </div>
            </div>
            <nav class="navigation">
                <a href="/airticket/index.php">Home</a>
                <a href="/airticket/about/about.html">About</a>
                <a href="/airticket/contact/contact.html">Contact</a>
                <button class="btnLogin-popup" onclick="window.location.href = '/airticket/logout/logout.php'">
                    Log Out
                </button>
            </nav>
        </div>
    </header>
    <?php
    if ($showAlert) {
        echo '<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display=`none`;"
      >&times;</span
    >
    <strong>Success!</strong> ' . $showAlert . '
  </div>';
    }
    ?>
    <div class="content">
        <h2 class="h2">AirTicket Reservation Contact Form</h2>
        <p class="p">
            To ensure a smooth air ticket reservation process, please use the
            contact form below to provide us with any necessary details or
            inquiries. <br />
            Include your full name, contact information, and a brief description of
            your request or issue. <br />
            Our team will respond promptly to assist you with any questions or
            concerns regarding your reservation, changes, or cancellations.
            <br />Your satisfaction is our priority, and we are here to make your
            travel experience as seamless as possible.
        </p>

        <div class="container">
            <div class="row">
                <form action="contact.php" method="POST">
                    <div class="col-25">
                        <label for="fname">Full Name</label>
                    </div>
                    <div class="row">
                        <div class="col-75">
                            <input type="text" id="fname" name="fullName" placeholder="Enter Your Full Name" />
                        </div>
                    </div>
                    <div class="col-25">
                        <label for="lname">Contact Number</label>
                    </div>
                    <div class="row">
                        <div class="col-75">
                            <input type="text" id="lname" name="Number" placeholder="Enter Your Number" />
                        </div>
                    </div>
                    <div class="col-25">
                        <label for="country">Email</label>
                    </div>
                    <div class="row">
                        <div class="col-75">
                            <input type="text" id="email" name="email" placeholder="Enter Your Email Address" />
                        </div>
                    </div>
                    <div class="col-25">
                        <label for="email">Select Your City</label>
                    </div>
                    <div class="row">
                        <div class="col-75">
                            <select id="country" name="city">
                                <option value="" selected hidden>City</option>
                                <option value="Islamabad">Islamabad</option>
                                <option value="Lahore">Lahore</option>
                                <option value="Karachi">Karachi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-25">
                        <label for="subject">Subject</label>
                    </div>
                    <div class="row">
                        <div class="col-75">
                            <textarea id="subject" name="subject" placeholder="Why You Want To Contact Us"
                                style="height: 200px"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" name="search" class="btnsub" />Submit</button>
                    </div>
                </form>
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
                        <li><a href="/airticket/index.php">Home</a></li>
                        <li><a href="/airticket/blogs/blogs.html">Blogs</a></li>
                        <li><a href="/airticket/about/about.html">About</a></li>
                        <li><a href="/airticket/contact/contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="footerBottom">
                <p>Copyright &copy;2024,airticket, Inc. or its affiliates</p>
            </div>
        </footer>
</body>

</html>