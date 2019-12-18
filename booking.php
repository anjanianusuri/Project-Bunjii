
<?php
    $page_title = 'Home';
    require_once ("initialize.php");
    include ('header.php');

    require_once ("initialize.php");
    require_once ("database.php");
    if(!isset($_SESSION['user'])) {
        echo "Please login to proceed Booking!!";
       header("Location: login.php");

    }
    else{

    if(isset($_GET['id'])) {

        global $conn;

        $id = $_GET['id'];
        $customer_id = $_SESSION['id'];

        // Declaring venue id to a variable to use it to find courts and coaches
        $customerSQL = "select * from customer where signupid='$customer_id'";
        $customerResult = mysqli_query($conn, $customerSQL);
        $customer = mysqli_fetch_assoc($customerResult);

        $courtsSQL = "select * from courts where court_id='$id'";
        $courtsResult = mysqli_query($conn, $courtsSQL);
        $court = mysqli_fetch_assoc($courtsResult);

        $courtsSQL = "select time_range from timings where court_id='$id'";
        $timingsResult = mysqli_query($conn, $courtsSQL);
        $timing = mysqli_fetch_array($timingsResult);

        $sql = mysqli_query($conn,"SELECT * FROM timings where court_id='$id'");

        //$data = mysql_fetch_array($sql);

        $venue_id=$court['venue_id'];
        $venueSQL = "select * from venue where venue_id='$venue_id'";
        $venueResult = mysqli_query($conn, $venueSQL);
        $venue = mysqli_fetch_assoc($venueResult);

        $coachsql = mysqli_query($conn,"SELECT * FROM coaches where venue_id='$venue_id'");
}
}
    ?>
    <div class="container">
    <h1>BOOKING <?php echo $venue['venue_name'];?></h1>
    <form action="include/booking.inc.php" method="POST">
        <input id="venueid" class="form-control" name="venueid" type="hidden" value="<?php echo $venue['venue_id'];?>">
        <label for="venuename">Venue Name</label>
        <input id="venuename" class="form-control" name="venuename" type="text" value="<?php echo $venue['venue_name'];?>">
        <input id="courtid" class="form-control" name="courtid" type="hidden" value="<?php echo $court['court_id'];?>">
        <label for="courtname">Court Name</label>
        <input id="courtname" class="form-control" name="courtname" type="text" value="<?php echo $court['court_name'];?>">
        <input id="customerid" class="form-control" name="customerid" type="hidden" value="<?php echo $customer['customer_id'];?>">
        <label for="customername">Customer Name</label>
        <input id="customername" class="form-control" name="customername" type="text" value="<?php echo $customer['customer_name'];?>">
        <label for="date">Date</label>
        <input id="date" class="form-control" name="date" type="date">
        <label for="time">Time Range</label>
        <div class="form-control">
         <select name="time">
           <option class="form-control" name="time">Select Time</option>
           <?php
                while ($row = mysqli_fetch_assoc($sql)) { ?>

                     <option class="form-control" name="time" value="<?php echo $row["time_range"]; ?>"><?php echo $row["time_range"]; ?></option>

            <?php  } ?>
            </select>
          </div>
          <br>
            <label for="coach">Coach</label>
            <div class="form-control">
             <select name="coach">
               <option class="form-control" name="coach">No Coach</option>
               <?php
                    while ($row1 = mysqli_fetch_assoc($coachsql)) { ?>
                         <option class="form-control" name="coach" value="<?php echo $row1["coach_name"]; ?>"><?php echo $row1["coach_name"]; ?></option>
                <?php  } ?>
                </select>
         </div>
         <br>
         <input class="btn btn-primary" type="Submit" name="submit" id="submit" value="Book">

    </form>
   </div>


<?php include('footer.php');?>
