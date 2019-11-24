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
    <h1>EDIT PROFILE</h1>
    <hr>
    <div class="col-md-2">
            <br>
            <a href="cPicEditVenue.php" class="text-primary">Edit Picture>></a>
        </div>
    <div class="col-md-6">
 
        <form action="venueEdit.php" method="POST">
        <input type="hidden" name="venue_id" value="<?php echo $venue_id;?>">
            <label for="name">Name</label>
            <input id="name" class="form-control" name="venue_name" type="text" value="<?php echo $venue['venue_name'];?>">
            <label for="desc">Description</label>
            <textarea name="venue_desc" id="desc" class="form-control"><?php echo $venue['venue_desc'];?></textarea>
           <label for="phone">Phone</label>
            <input id="name" name="venue_phone" class="form-control" type="text" value="<?php echo $venue['venue_phone'];?>"> 
            <label for="phone">Venue Type</label>
            <input id="name" name="venue_type" class="form-control" type="text" value="<?php echo $venue['venue_type'];?>">
            <input type="Submit" name="submit" value="Update Profile">
 

        </form>
    </div>
</div>

<?php include ('footer.php'); ?>

