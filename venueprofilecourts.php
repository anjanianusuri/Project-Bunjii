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

    }
?>
<div class="container">
    <div class="row">
        <div class="container">
        <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="venueprofile.php">Profile</a></li>
                    <li class="nav-item">
                        <a class="nav-link active" href="venueprofilecourts.php">Courts</a>
                    <li class="nav-item">
                        <a class="nav-link" href="venueprofilegallery.php">Gallery</a>
                    <li class="nav-item">
                            <a class="nav-link" href="venueprofilecoaches.php">Coaches</a>
                    <li class="nav-item">
                            <a class="nav-link" href="venueprofilebookings.php">Bookings</a>
                    </li>
        </ul>
    </div>
    <div class="container">
      <br>
    <h2>Courts</h2>
    <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
    <?php while($courts = mysqli_fetch_assoc($courtsResult)) { ?>
    <table>
        <tr>
            <td class="profiletable"><b><?php echo $courts['court_name']; ?></b></td>
        </tr>
        <tr>
            <?php

            // Declaring court id to a variable to use it to find timings

            $court_id = $courts['court_id'];
            $timingsSQL = "select * from timings where court_id='$court_id'";
            $timingsResult = mysqli_query($conn, $timingsSQL);

            while ($timings = mysqli_fetch_assoc($timingsResult)) { ?>
              <td class="profiletable"> <?php  echo $timings['time_range']; }?> </td>
            </tr>
    </table>
    <?php } ?>
</div>

<?php include ('footer.php'); ?>
