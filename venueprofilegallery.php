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

        $gallerySQL = "select * from gallery where venue_id='$venue_id'";
        $galleryResult = mysqli_query($conn, $gallerySQL);

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
                            <a class="nav-link active" href="venueprofilegallery.php">Gallery</a>
                    <li class="nav-item">
                            <a class="nav-link" href="venueprofilecoaches.php">Coaches</a>
                    <li class="nav-item">
                            <a class="nav-link" href="venueprofilebookings.php">Current Bookings</a>
                    <li class="nav-item">
                            <a class="nav-link" href="venueprofilebookingshistory.php">Booking History</a>
                    </li>
        </ul>
    </div>
    <div class="container">
      <br>
    <h2>Gallery</h2>
    <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
    <?php while($gallery = mysqli_fetch_assoc($galleryResult)) { ?>
    <table>
        <tr>
            <td class="profiletable"><b><?php echo $gallery['venue_image']; ?></b></td>
        </tr>
        <tr>
    </table>
    <?php } ?>
    <br>
    <a href="addphotos.php" class="text-primary">Add Photos >></a>
</div>

<?php include ('footer.php'); ?>
