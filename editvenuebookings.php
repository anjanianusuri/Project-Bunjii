<?php
$page_title = 'Home';
require_once ("initialize.php");
include ('header.php');
require_once ("database.php");

if(isset($_SESSION['user'])) {

    global $conn;

    $id = $_GET['id'];

    $bookingSQL = "select * from booking where booking_id='$id'";
    $bookingResult = mysqli_query($conn, $bookingSQL);
    $booking = mysqli_fetch_assoc($bookingResult);

    $venue_id = $booking['venue_id'];
    $venueSQL = "select * from venue where venue_id = '$venue_id'";
    $venueResult = mysqli_query($conn, $venueSQL);
    $venue = mysqli_fetch_assoc($venueResult);

    $court_id = $booking['court_id'];

    $sql = mysqli_query($conn,"SELECT * FROM timings where court_id='$court_id';");

}
?>
<div class="container">
    <h1>EDIT BOOKING</h1>
    <hr>
    <div class="col-md-6">
        <form action="include/editvenuebookings.inc.php" method="POST">
            <label><strong>Booking ID</strong></label>
            <input id="bookingid" class="form-control" name="bookingid" value= "<?php echo $booking['booking_id'];?>" readonly>
            <label><strong>Venue Name</strong></label>
            <input id="customername" class="form-control" name="customername" value= "<?php echo $booking['customer_name'];?>" readonly>
            <label><strong>Court Name</strong></label>
            <input id="courtname" class="form-control" name="courtname" value= "<?php echo $booking['court_name'];?>" readonly>
            <label for="date">Date</label>
            <input id="date" class="form-control" name="date" type="date" value= "<?php echo $booking['date'];?>">
            <label for="time">Time Range</label>
            <div class="form-control">
             <select name="time"><?php
                    while ($row = mysqli_fetch_assoc($sql)) { ?>

                         <option class="form-control" name="time" value="<?php echo $row["time_range"]; ?>"><?php echo $row["time_range"]; ?></option>

                <?php  } ?>
                </select>
             </div>
            <br>
            <input class="btn btn-primary" type="submit" name="submit" value="Update">
        </form>
    </div>
</div>

<?php include ('footer.php'); ?>
