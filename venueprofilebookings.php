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

        $bookingsSQL = "select * from bookings where venue_id='$venue_id'";
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
                            <a class="nav-link" href="venueprofilecoaches.php">Coaches</a>
                    <li class="nav-item">
                            <a class="nav-link active" href="venueprofilebookings.php">Bookings</a>
                    </li>
        </ul>
    </div>
    <div class="container">
      <br>
      <h2>Bookings</h2>
      <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      <?php while($bookings = mysqli_fetch_assoc($bookingsResult)) { ?>
          <table>
              <tr>
                 <td><strong> BOOKING <?php echo $bookings['booking_id']; ?> </strong></td>
                 <hr>
              </tr>
              <tr>
                  <td><strong>Court Name</strong> <?php echo $bookings['court_name']; ?></td>
              </tr>
              <tr>
                  <td><strong>Player Name</strong> <?php echo $bookings['player_name']; ?></td>
              </tr>
          </table>
      <?php } ?>
</div>

<?php include ('footer.php'); ?>
