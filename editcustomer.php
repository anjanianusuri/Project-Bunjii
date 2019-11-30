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

}
?>
<div class="container">
    <h1>EDIT PROFILE</h1>
    <hr>
    <div class="col-md-6">

        <form action="include/editcustomer.inc.php" method="POST">
            <input id="customer_id" class="form-control" name="customer_id" type="hidden" value="<?php echo $customer['customer_id'];?>">
            <label for="customer_name">Name</label>
            <input id="customer_name" class="form-control" name="customer_name" type="text" value="<?php echo $customer['customer_name'];?>">
            <label for="customer_age">Age</label>
            <input name="customer_age" id="customer_age" class="form-control" value= "<?php echo $customer['customer_age'];?>">
            <label for="customer_gender">Gender</label>
            <input id="customer_gender" name="customer_gender" class="form-control" type="text" value="<?php echo $customer['customer_gender'];?>">
            <label for="customer_phone">Phone</label>
            <input id="customer_phone" name="customer_phone" class="form-control" type="text" value="<?php echo $customer['customer_phone'];?>">
            <label for="customer_address">Address</label>
            <input id="customer_address" class="form-control" name="customer_address" type="text" value="<?php echo $customer['customer_address'];?>">
            <label for="customer_interests">Interests</label>
            <input name="customer_interests" id="desc" class="form-control" value= "<?php echo $customer['customer_interests'];?>">
            <label for="customer_desc">Description</label>
            <textarea id="customer_desc" name="customer_desc" class="form-control" type="text"><?php echo $customer['customer_desc'];?>"</textarea>
            <br>
            <input class="btn btn-primary" type="submit" name="submit" value="Update">

        </form>
    </div>
</div>

<?php include ('footer.php'); ?>
