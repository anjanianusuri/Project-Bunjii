
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
        $CustomerSQL = "select * from customer where signupid='$customer_id'";
        $CustomerResult = mysqli_query($conn, $CustomerSQL);
        $Customer = mysqli_fetch_assoc($CustomerResult);

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
    ?>
    <div class="container">
    <h1>
   </div>
   <?php 
   } ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'><link rel="stylesheet" href="css/styleb.css">
</head>
<body>


<form action="bookingscode.php" method="post">
  <!--  General -->
  <div class="form-group">
    <h2 class="heading">Venue & Customer</h2>
    <input type="hidden" id="hidden" class="floatLabel" name="venue_id" value="<?php echo $venue['venue_id']; ?>" readonly="true">
    <input type="hidden" id="hidden" class="floatLabel" name="customer_id" value="<?php echo $Customer['customer_id']; ?>" readonly="true">
    <input type="hidden" id="hidden" class="floatLabel" name="court_id" value="<?php echo $court['court_id']; ?>" readonly="true">
   
    <div class="controls">
      <input type="text" id="name" class="floatLabel" name="venue_name" value="<?php echo $venue['venue_name']; ?>" readonly="true">
      <label for="name">Venue Name</label>
    </div>
    <div class="controls">
      <input type="text" id="email" class="floatLabel" name="court_name" value="<?php echo $court['court_name']; ?>" readonly="true">
      <label for="email">Court Name</label>
    </div>       
    <div class="controls">
      <input type="text" id="phone" class="floatLabel" name="player_name" value="<?php echo $Customer['customer_name']; ?>" readonly="true">
      <label for="phone">Player Name</label>
    </div>
      
  <!--  Details -->
  <div class="form-group">
    <h2 class="heading">Date & Time</h2>
    <div class="grid">
    <div class="col-1-4 col-1-4-sm">
      <div class="controls">
        <input type="date" class="floatLabel" name="date">
        <label for="arrive" class="label-date"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Date</label>
      </div>      
    </div>
    <div class="col-1-3 col-1-3-sm">
    <div class="controls">
      <i class="fa fa-sort"></i>
      
     <select name="time"><?php
            while ($row = mysqli_fetch_assoc($sql)) { ?>
    
                 <option value="<?php echo $row["time_range"]; ?>"><?php echo $row["time_range"]; ?></option> 

        <?php  } ?>
        </select>
  
     </div>     
    </div>
     </div>
            <button type="submit" name="Submit" value="Submit" class="col-1-4" style="background:#007bff;">Submit</button>
      </div>
  </div> <!-- /.form-group -->
</form>
<!-- partial -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery-ui-autocomplete.js'></script>
<script src='http://raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery.select-to-autocomplete.js'></script>
<script src='http://raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery.select-to-autocomplete.min.js'></script>
<script  src="js/script.js"></script>
</body>
</html>
<?php include('footer.php');?>