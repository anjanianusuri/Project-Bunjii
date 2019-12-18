<?php
$page_title = 'Home';
require_once ("initialize.php");
include ('header.php');
require_once ("database.php");

    if(isset($_SESSION['user'])) {

        global $conn;

        $id = $_SESSION['id'];

        $customerSQL = "select * from customer where signupid='$id'";
        $customerResult = mysqli_query($conn, $customerSQL);
        $customer = mysqli_fetch_assoc($customerResult);

        // Declaring venue id to a variable to use it to find courts and coaches

        $customer_id = $customer['customer_id'];

        $bookingsSQL = "select * from booking where customer_id='$customer_id' and date < curdate()";
        $bookingsResult = mysqli_query($conn, $bookingsSQL);

    }
?>
<div class="container">
  <h1>BOOKING HISTORY</h1>
  <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
    <div class="row">
        <div class="container">
        <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <li class="nav-item">
                          <a class="nav-link" href="customerprofile.php">Profile</a></li>
                      <li class="nav-item">
                              <a class="nav-link" href="customerprofilebookings.php">Current Bookings</a>
                      <li class="nav-item">
                              <a class="nav-link active" href="customerprofilebookingshistory.php">Booking History</a>
                    </li>
        </ul>
    </div>
    <div class="container">
      <br>
      <h2>Bookings</h2>
      <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      <div class="row">
      <?php while($bookings = mysqli_fetch_assoc($bookingsResult)) {
        $venue_id = $bookings['venue_id'];

        $venueSQL = "select * from venue where venue_id='$venue_id'";
        $venueResult = mysqli_query($conn, $venueSQL);
        $venue = mysqli_fetch_assoc($venueResult);

        $venueid = $venue['venue_id'];

        $gallerysql = "select * from gallery where venue_id = '$venueid' and image_id = 1";
        $galleryResult = mysqli_query($conn, $gallerysql);

        ?>
        <div class="card" style="width: 18rem; margin: 20px;">
          <img class="card-img-top" src="include/uploads/<?php
          $gallery = mysqli_fetch_assoc($galleryResult);

          if ($gallery['venue_image'] == ""){
             echo "default.jpg";}
            else {
              echo $gallery['venue_image'];
            }?>">
            <div class="card-body">
              <h5 class="card-title">BOOKING <?php echo $bookings['booking_id']; ?> </h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>Court Name: </strong> <?php echo $bookings['court_name']; ?></li>
              <li class="list-group-item"><strong>Venue Name: </strong> <?php echo $venue['venue_name']; ?></li>
              <li class="list-group-item"><strong>Date: </strong> <?php echo $bookings['date']; ?> </li>
              <li class="list-group-item"><strong>Time: </strong> <?php echo $bookings['time']; ?></li>
              <li class="list-group-item"><strong>Coach: </strong> <?php echo $bookings['coach']; ?> </li>
            </ul>
          </div>
      <?php } ?>
</div>

<?php include ('footer.php'); ?>
