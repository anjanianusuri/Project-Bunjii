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

    }
?>
<div class="container">
    <h1>PROFILE</h1>
    <a class="btn btn-primary my-2 my-sm-0 menubuttons" href="customerprofileE.php" name="prof" style="margin-right: 1013px;">Edit Profile</a>
    <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
    <h2>Player Name: <?php echo $customer['customer_name'];?></h2>
    <table>
        <tr>
            <td><strong>About</strong></td>
            <td class="profiletable"><?php echo $customer['customer_desc']?></td>
        </tr>
        <tr>
            <td><strong>Age</strong></td>
            <td class="profiletable"><?php echo $customer['customer_age']?></td>
        </tr>
        <tr>
            <td><strong>Gender</strong></td>
            <td class="profiletable"><?php echo $customer['customer_gender']?></td>
        </tr>
       
        <tr>
            <td><strong>Phone</strong></td>
            <td class="profiletable"><?php echo $customer['customer_phone'] ?></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td class="profiletable"><?php echo $signup['email'] ?></td>
        </tr>
      
    </table>
    
    <hr>
    <h1>PREVIOUS BOOKINGS</h1>
    <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
</div>
