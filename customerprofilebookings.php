<?php
$page_title = 'Home';
require_once ("initialize.php");
include ('header.php');
require_once ("database.php");

    if(isset($_SESSION['user'])) {

        global $conn;

        $id = $_SESSION['id'];

        $customerSQL = "select * from customer where signupid='$id'";
        $customerResult = mysqli_query($conn, $customerSQL);
        $customer = mysqli_fetch_assoc($customerResult);

        // Declaring venue id to a variable to use it to find courts and coaches

        $customer_id = $customer['customer_id'];

        $bookingsSQL = "select * from booking where customer_id='$customer_id'";
        $bookingsResult = mysqli_query($conn, $bookingsSQL);

    }
?>
<div class="container">
  <h1>BOOKINGS</h1>
  <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
    <div class="row">
        <div class="container">
        <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <li class="nav-item">
                          <a class="nav-link" href="customerprofile.php">Profile</a></li>
                      <li class="nav-item">
                              <a class="nav-link active" href="customerprofilebookings.php">Bookings</a>
                    </li>
        </ul>
    </div>
    <div class="container">
      <br>
      <?php while($bookings = mysqli_fetch_assoc($bookingsResult)) { ?>
          <table>
              <tr>
                 <td><strong> BOOKING <?php echo $bookings['booking_id']; ?> </strong></td>
                 <hr>
              </tr>
              <?php
                $venue_id = $bookings['venue_id'];
                $venueSQL = "select * from venue where venue_id='$venue_id'";
                $venueResult = mysqli_query($conn, $venueSQL);
                $venue = mysqli_fetch_assoc($venueResult);
              ?>
              <tr>
                  <td><strong>Venue Name: </strong> <?php echo $venue['venue_name']; ?></td>
              </tr>
              <tr>
                  <td><strong>Court Name: </strong> <?php echo $bookings['court_name']; ?></td>
              </tr>
              <tr>
                  <td><strong>Date: </strong> <?php echo $bookings['date']; ?> </td>
              </tr>
              <tr>
                  <td><strong>Time: </strong> <?php echo $bookings['time']; ?> </td>
              </tr>
          </table>
      <?php } ?>
</div>

<?php include ('footer.php'); ?>
