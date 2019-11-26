
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
    <h1>BOOKING <?php echo $venue['venue_name'];?></h1>
    <form action="" method="POST">
    <input type="hidden" name="venue_id" value="<?php echo $venue_id;?>">
        <label for="name">Venue Name</label>
        <input id="name" class="form-control" name="venue_name" type="text" value="<?php echo $venue['venue_name'];?>">
        <label for="name">Customer Name</label>
        <input id="name" class="form-control" name="venue_name" type="text" value="<?php echo $customer['customer_name'];?>">

    </form>
   </div>


<?php include('footer.php');?>
