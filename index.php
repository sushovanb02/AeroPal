<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "aeropal_db";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM airport_maps";
if( isset($_GET['airport']) ){
    $airport = mysqli_real_escape_string($con, htmlspecialchars($_GET['airport']));
    $airline = mysqli_real_escape_string($con, htmlspecialchars($_GET['airline']));
    $date = mysqli_real_escape_string($con, htmlspecialchars($_GET['date']));
    $flight_id= mysqli_real_escape_string($con, htmlspecialchars($_GET['flight_id']));
    $sql = "SELECT * FROM airport_maps WHERE airport= '$airport' AND  airline= '$airline' AND dt= '$date' AND 
    flight_id='$flight_id'";
}
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700"
    />
    <link rel="stylesheet" href="app.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>AeroPal</title>
  </head>
  <body>
    <div id="stripes">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <!--------------------------------- CUSTOM NAVBAR ----------------------------------------------->
    <header>
      <div class="overlay"></div>
      <div class="container">
          <nav>
              <h1 class="brand"><a href="index.html"><span>AERO</span>PAL</a></h1>
              <ul>
                  <li><a href="#">HOME</a></li>
                  <li><a href="#">SERVICES</a></li>
                  <li><a href="about-us.html">ABOUT</a></li>
                  <li><a href="#">CONTACT US</a></li>
              </ul>
          </nav>
      </div>
  </header>
  <!--------------------------------- CUSTOM NAVBAR END ----------------------------------------------->
  
  <!--------------------------------- FORM START ----------------------------------------------->
  <div class="form">
    <div class="title">Search Your Route</div>
    <div class="content">
      <form action="search.php" method="GET">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Enter Airport</span>
            <input type="text" placeholder="Enter airport name" name="airport" required>
          </div>
          <div class="input-box">
            <span class="details">Enter Airline</span>
            <input type="text" placeholder="Enter airline name" name="airline" required>
          </div>
          <div class="input-box">
            <span class="details">Enter Flight Id</span>
            <input type="text" placeholder="Enter airline name" name="flight_id" required>
          </div>
          <div class="date">
            <label for="start">Date of Departure: </label>
            <input
              type="date"
              id="start"
              value="2021-08-12"
              min="2021-01-01"
              max="2050-12-31"
              name= "date"
            />
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Search">
        </div>
      </form>
    </div>
  </div>
  <!--------------------------------- FORM END ----------------------------------------------->

    <footer>
      <div class="main-content">
        <div class="left box">
          <h2>About Us</h2>
          <div class="content">
            <p>
              AeroPal aims at providing well-routed maps with proper steps to
              users based on his/her flight details and the airport. A
              step-by-step guide when laid out in front of the user, sets a
              clear goal in his/her mind and does not lead to unnecessary
              wastage of time.
            </p>
            <div class="social">
              <a href="#"><span class="fab fa-facebook-f"></span></a>
              <a href="#"><span class="fab fa-twitter"></span></a>
              <a href="#"><span class="fab fa-instagram"></span></a>
              <a href="#"><span class="fab fa-youtube"></span></a>
            </div>
          </div>
        </div>
        <div class="center box">
          <h2>Address</h2>
          <div class="content">
            <div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">Vishalnagar, Raipur</span>
            </div>
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text">+00-00000000</span>
            </div>
            <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text">AeroPal@gmail.com</span>
            </div>
          </div>
        </div>
        <div class="right box">
          <h2>Contact Us</h2>
          <div class="content">
            <form action="#">
              <div class="email">
                <div class="text">Email</div>
                <input type="email" required />
              </div>
              <div class="msg">
                <div class="text">Message</div>
                <span class="textarea"><textarea rows="3" cols="25" required></textarea></span>
              </div>
              <div class="btn">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
