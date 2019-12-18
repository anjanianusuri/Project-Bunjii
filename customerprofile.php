
<?php
$page_title = 'Home';
require_once ("initialize.php");
include ('header.php');
require_once ("database.php");

    if(isset($_SESSION['user'])) {

        global $conn;
        $id = $_SESSION['id'];

        $signupSQL = "select * from users where signupid='$id'";
        $signupResult = mysqli_query($conn, $signupSQL);
        $signup = mysqli_fetch_assoc($signupResult);

        $customerSQL = "select * from customer where signupid='$id'";
        $customerResult = mysqli_query($conn, $customerSQL);
        $customer = mysqli_fetch_assoc($customerResult);
        $cid=$customer['customer_id'];

        $BookingSQL = "select * from bookings where customer_id='$cid'";
        $BookingResult = mysqli_query($conn, $BookingSQL);

    }
?>
<div class="container">
    <h1>PROFILE</h1>
    <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
    <div class="container">
        <div class="row">
            <div class="container">
            <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="venueprofile.php">Profile</a></li>
                        <li class="nav-item">
                                <a class="nav-link" href="customerprofilebookings.php">Current Bookings</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="customerprofilebookingshistory.php">Booking History</a>
            </ul>
        </div>
      </div>
      <div class="container">
    <table>
        <tr>
            <td><strong>Name</strong></td>
            <td class="profiletable"><?php echo $customer['customer_name'];?></td>
        </tr>
        <tr>
            <td><strong>About</strong></td>
            <td class="profiletable"><?php echo $customer['customer_desc'];?></td>
        </tr>
        <tr>
            <td><strong>Interests</strong></td>
            <td class="profiletable"><?php echo $customer['customer_interests'];?></td>
        </tr>
        <tr>
            <td><strong>Age</strong></td>
            <td class="profiletable"><?php echo $customer['customer_age'];?></td>
        </tr>
        <tr>
            <td><strong>Gender</strong></td>
            <td class="profiletable"><?php echo $customer['customer_gender'];?></td>
        </tr>
        <tr>
            <td><strong>Phone</strong></td>
            <td class="profiletable"><?php echo $customer['customer_phone'];?></td>
        </tr>
        <tr>
            <td><strong>Address</strong></td>
            <td class="profiletable"><?php echo $customer['customer_address'];?></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td class="profiletable"><?php echo $signup['email'] ?></td>
        </tr>
    </table>
    <br>
    <a href="editcustomer.php" class="text-primary">Edit Profile >></a>
</div>

</body>
</html>
</div>
<?php include('footer.php'); ?>
