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
    <h1>ADD COACH</h1>
    <hr>
    <div class="col-md-6">

        <form action="include/addcoach.inc.php" method="POST">
            <input type="hidden" id="venue_id" name="venue_id" value="<?php echo $venue_id;?>">
            <label for="name">Coach Name</label>
            <input id="coach_name" name="coach_name"  class="form-control" type="text">
            <label for="desc">Coach Description</label>
            <textarea id="coach_desc" name="coach_desc" class="form-control"></textarea>
            <br>
            <input class="btn btn-primary" type="submit" name="submit" value="Add">
        </form>
    </div>
</div>

<?php include ('footer.php'); ?>
