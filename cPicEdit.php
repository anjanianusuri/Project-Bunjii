
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
    <img src="include/uploads/<?php echo $customer['customer_profpic'];?>" height="100px" width="100px" style="margin-left: 1183px;
margin-top: -245px;">
    <h2>Player Name: <?php echo $customer['customer_name'];?></h2>
    <form method="post" action="profPicE.php" enctype="multipart/form-data" >
    <label for="name">Profile Picture</label>
    <input type="hidden" name="cust_id" value="<?php echo $customer['customer_id'];?>">
            <input class = "form-control" type="file" id="name" name="file">
            <input type="submit" name="submit" value="Upload">
    </form>
 
   
<?php include('footer.php'); ?>