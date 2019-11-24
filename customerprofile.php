
<?php
$page_title = 'Home';
require_once ("initialize.php");
include ('header.php');
require_once ("database.php");

    if(isset($_SESSION['user'])) {

        global $conn;
        $id = $_SESSION['id'];

        $signupSQL = "select * from users where signupid='$id'";
        $signupResult = mysqli_query($conn, $signupSQL);
        $signup = mysqli_fetch_assoc($signupResult);

        $customerSQL = "select * from customer where signupid='$id'";
        $customerResult = mysqli_query($conn, $customerSQL);
        $customer = mysqli_fetch_assoc($customerResult);
        $cid=$customer['customer_id'];
                
        $BookingSQL = "select * from bookings where customer_id='$cid'";
        $BookingResult = mysqli_query($conn, $BookingSQL);
     
    }
?>
<div class="container">
    <h1>PROFILE</h1>
   
    <a class="btn btn-primary my-2 my-sm-0 menubuttons" href="customerprofileE.php" name="prof" style="margin-right: 1013px;">Edit Profile</a>
    <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
    <img src="include/uploads/<?php echo $customer['customer_profpic'];?>" height="100px" width="100px" style="margin-left: 1183px;
margin-top: -245px;">
    <h2>Player Name: <?php echo $customer['customer_name'];?></h2>
    <table>
        <tr>
            <td><strong>About</strong></td>
            <td class="profiletable"><?php echo $customer['customer_desc']?></td>
        </tr>
        <tr>
            <td><strong>Age</strong></td>
            <td class="profiletable"><?php echo $customer['customer_age']?></td>
        </tr>
        <tr>
            <td><strong>Gender</strong></td>
            <td class="profiletable"><?php echo $customer['customer_gender']?></td>
        </tr>
        <tr>
            <td><strong>Phone</strong></td>
            <td class="profiletable"><?php echo $customer['customer_phone'] ?></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td class="profiletable"><?php echo $signup['email'] ?></td>
        </tr>
    </table>
    <hr>
    <h1>BOOKINGS</h1>

      <html lang="en" >
<head>
  <meta charset="UTF-8">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/stylet.css">
</head>
<body>
<table class="rwd-table">
  <tr>
    <th>Venue</th>
    <th>Court</th>
    <th>Date</th>
    <th>Time</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($BookingResult)) { ?>
  <tr>
    <td data-th="Venue"><?php echo $row['venue_name']; ?></td>
    <td data-th="Court"><?php echo $row['court_name']; ?></td>
    <td data-th="Date"><?php echo $row['date']; ?></td>
    <td data-th="Time"><?php echo $row['time']; ?></td>
  </tr>
  <?php } ?>
</table>
<!-- partial -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="./script.js"></script>
</body>
</html>
<hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
</div>
<?php include('footer.php'); ?>