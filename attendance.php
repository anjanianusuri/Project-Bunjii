
<?php
    $page_title = 'Home';
    require_once ("initialize.php");
    include ('header.php');

    require_once ("initialize.php");
    require_once ("database.php");

    if(isset($_GET['id'])) {

        global $conn;

        $id = $_GET['id'];

        $bookingsql = "select * from booking where booking_id='$id'";
        $bookingResult = mysqli_query($conn, $bookingsql);
        $booking = mysqli_fetch_assoc($bookingResult);

}
?>
    <div class="container">
    <h1>ATTENDANCE</h1>
    <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
    <form action="include/attendance.inc.php" method="POST">
      <label><strong>Booking ID</strong></label>
      <input id="bookingid" class="form-control" name="bookingid" value= "<?php echo $booking['booking_id'];?>" readonly>
      <label><strong>Attendance</strong></label>
      <select class="form-control" name="attendance">
        <option class="form-control" name="attendance">Select</option>
        <option class="form-control" name="attendance">Yes</option>
        <option class="form-control" name="attendance">No</option>
         </select>
          <br>
          <input class="btn btn-primary" type="Submit" name="submit" id="submit" value="Submit">
    </form>
   </div>


<?php include('footer.php');?>
