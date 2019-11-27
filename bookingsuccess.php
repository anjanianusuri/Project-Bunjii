
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
}
}
    ?>
    <div class="container">
    <h1>BOOKING</h1>
    <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
    <h5 class="text-success">Your booking has been successful</h5>
    <br>
    <input class=" btn btn-primary" type="submit" name="submit" id="submit" value="View"/>
    </form>
   </div>


<?php include('footer.php');?>
