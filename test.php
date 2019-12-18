<?php
$page_title = 'Home';
require_once ("initialize.php");
include ('header.php');
require_once ("database.php");

    if(isset($_SESSION['user'])) {

        global $conn;

        $id = $_SESSION['id'];

        $venueSQL = "select * from venue where signupid='$id'";
        $venueResult = mysqli_query($conn, $venueSQL);
        $venue = mysqli_fetch_assoc($venueResult);

        // Declaring venue id to a variable to use it to find courts and coaches

        $venue_id = $venue['venue_id'];

        $courtsSQL = "select * from courts where venue_id='$venue_id'";
        $courtsResult = mysqli_query($conn, $courtsSQL);

        $coachesSQL = "select * from coaches where venue_id='$venue_id'";
        $coachesResult = mysqli_query($conn, $coachesSQL);

        $bookingsSQL = "select * from booking where venue_id='$venue_id' and date > curdate()";
        $bookingsResult = mysqli_query($conn, $bookingsSQL);

    }
?>
<div class="container">
    <div class="row">
        <div class="container">
        <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="venueprofile.php">Profile</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="venueprofilecourts.php">Courts</a>
                    <li class="nav-item">
                        <a class="nav-link" href="venueprofilegallery.php">Gallery</a>
                    <li class="nav-item">
                            <a class="nav-link" href="venueprofilecoaches.php">Coaches</a>
                    <li class="nav-item">
                            <a class="nav-link active" href="venueprofilebookings.php">Current Bookings</a>
                    <li class="nav-item">
                            <a class="nav-link" href="venueprofilebookingshistory.php">Booking History</a>
                    </li>
        </ul>
    </div>
    <div class="container">
      <br>
      <h2>Bookings</h2>
      <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      <div class="row">
      <?php while($bookings = mysqli_fetch_assoc($bookingsResult)) { ?>
        <div class="card" style="width: 18rem; margin: 20px;">
          <img class="card-img-top" src="include/uploads/<?php
          if ($venue['venue_image'] == ""){
             echo "default.jpg";}
            else {
              echo $venue['venue_image'];
            }?>">
            <div class="card-body">
              <h5 class="card-title">BOOKING <?php echo $bookings['booking_id']; ?> </h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>Court Name: </strong> <?php echo $bookings['court_name']; ?></li>
              <li class="list-group-item"><strong>Player Name: </strong> <?php echo $bookings['customer_name']; ?></li>
              <li class="list-group-item"><strong>Date: </strong> <?php echo $bookings['date']; ?> </li>
              <li class="list-group-item"><strong>Time: </strong> <?php echo $bookings['time']; ?></li>
              <li class="list-group-item"><strong>Coach: </strong> <?php echo $bookings['coach']; ?> </li>
            </ul>
            <div class="card-body">
              <a href="editvenuebookings.php?id=<?php echo $bookings['booking_id']; ?>" class="card-link">Edit Booking</a>
              <a href="editvenuebookings.php?id=<?php echo $bookings['booking_id']; ?>" class="card-link">Cancel Booking</a>
            </div>
          </div>
      <?php } ?>
    </div>
</div>

<?php include ('footer.php'); ?>
