<?php include('include/signupheader.php'); ?>
<?php
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
   
<ul class="nav nav-tabs">

    <li class="nav-item">
    
        <a class="nav-link active" href="#">Edit Profile</a></li>
        <div class="col-md-6">
            <br>
            <a href="cPicEdit.php" class="text-primary">Edit Profile Picture>></a>
        </div>
</ul>
        <form action="customerprofileEdit.php" method="POST">
            <label for="name">ID</label>
            <input class = "form-control" type="hidden" name="cust_id" value="<?php echo $customer['customer_id'];?>" />
            
            <small id="nMessage" class="form-text text-muted"></small>
            <label for="name">Name</label>
           
            <input class = "form-control" type="text" name="name" value="<?php echo $customer['customer_name'];?>" />
            <small id="nMessage" class="form-text text-muted"></small>
           
            <label for="name">Contact Number</label>
            <input class = "form-control" type="text"  name="contact" value="<?php echo $customer['customer_phone'];?>" />
           
            <small id="nMessage" class="form-text text-muted"></small>
            <label for="name">Address</label>
           
            <input class = "form-control" type="text"  name="address" value="<?php echo $customer['customer_address'];?>"/>
            <small id="nMessage" class="form-text text-muted"></small>
            
            <label for="name">Age</label>
            <input class = "form-control" type="text" name="age" value="<?php echo $customer['customer_age'];?>" />
           
            <small id="nMessage" class="form-text text-muted"></small>
            <label for="name">Gender</label>
           
            <select class = "form-control" name="gender" >
                <option value="MALE" checked='true'>MALE</option>
                <option value="FEMALE" checked="true">FEMALE</option>
            </select>
           
            <small id="nMessage" class="form-text text-muted"></small>
            <label for="name">Interest</label>
           
            <input class = "form-control" type="text"  name="interest" value="<?php echo $customer['customer_interests'];?>" />
            <small id="nMessage" class="form-text text-muted"></small>
           
            <label for="name">Description</label>
            <textarea class = "form-control"  name="description" placeholder="Write something about you........."><?php echo $customer['customer_desc'];?></textarea>
           
            <small id="nMessage" class="form-text text-muted"></small>
            <input class="btn btn-primary" type="submit" name="submit" id="submit"/>
        </form>
    </div>
  </div>
</div>
<?php include ('footer.php'); ?>