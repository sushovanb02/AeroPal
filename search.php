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
    $date = mysqli_real_escape_string($con, htmlspecialchars($_GET['date']));
    $flight_id= mysqli_real_escape_string($con, htmlspecialchars($_GET['flight_id']));
    $sql = "SELECT * FROM airport_maps WHERE airport= '$airport' AND dt= '$date' AND 
    flight_id='$flight_id'";
}
$result = $con->query($sql);
?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700"
    />
    <link rel="stylesheet" href="search.css">
    <title>Search-Results</title>
  </head>
  <body>
    <div class="result">
    <h1>Search Result:</h1>

        <?php
        while($row = $result->fetch_assoc()){
            ?>

            <img src= "<?php echo $row['map'];?>">

            <?php
        }
        ?>
  </div>
  <marquee behavior=scroll direction="right" scrollamount="5" scrolldelay="10">
  <h2>Happy Journey! Have a safe flight! </h2>
      </marquee>
  </body>
  </html>

  