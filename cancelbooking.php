
<?php
    $page_title = 'Home';
    require_once ("initialize.php");
    include ('header.php');

    require_once ("initialize.php");
    require_once ("database.php");

    if(isset($_GET['id'])) {

        global $conn;

        $id = $_GET['id'];

        $bookingSQL = "select * from booking where booking_id='$id'";
        $bookingResult = mysqli_query($conn, $bookingSQL);
        $booking = mysqli_fetch_assoc($bookingResult);
}
    ?>
    <div class="container">
    <h1>CANCEL BOOKING</h1>
    <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
    <h5 class="text-danger">Are you sure you want to cancel this booking?</h5>
    <br>
    <div class="card border-danger mb-3" style="max-width: 18rem;">
      <div class="card-header">Booking <?php echo $booking['booking_id']; ?></div>
      <div class="card-body">
        <h5 class="card-title"><?php echo $booking['customer_name']; ?></h5>
        <p class="card-text"><?php echo $booking['date']; ?></p>
        <p class="card-text"><?php echo $booking['time']; ?></p>
      </div>
    </div>
    <form action="include/cancelbooking.inc.php" method="POST">
      <input type="hidden" name= "bookingid" value="<?php echo $booking['booking_id'];?>">
      <input class="btn btn-outline-success" type="Submit" name="no" id="no" value="No">
      <input class="btn btn-danger" type="Submit" name="submit" id="submit" value="Yes">
    </form>
   </div>


<?php include('footer.php');?>
