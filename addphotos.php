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
}
?>
<div class="container">
    <h1>ADD PHOTOS</h1>
    <hr>
    <div class="col-md-6">

        <form action="include/addphotos.inc.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="venue_id" name="venue_id" value="<?php echo $venue_id;?>">
            <input type="file" name="photo" id="photo" accept="image/*">
            <br>
            <input class="btn btn-primary" type="submit" name="submit" value="Add">
        </form>
    </div>
</div>

<?php include ('footer.php'); ?>
