<?php
    $page_title = 'Login';
    require_once("initialize.php");
    include('header.php');
    $email = isset($_GET['email']) ? $_GET['email'] : "";
?>

<div class="container">
<ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="login.php">Customer</a></li>
            <li class="nav-item">
                <a class="nav-link active" href="venuelogin.php">Venue</a>
            </li>
</ul>
    <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
    <div class="col-md-5">
        <?php if(isset($_GET['login'])){
            if($_GET['login'] === 'success'){
                echo "<p class='text-success'>Sign Up successful. Login Now</p>";
            }
        }
        if(isset($_GET['error'])){
            if($_GET['error'] === 'emptyfeilds'){
                echo "<p class='text-danger'>Please fill all the fields</p>";
            }
            else if($_GET['error'] === 'invalidemail'){
                echo "<p class='text-danger'>Please enter a valid email</p>";
            }
            else if($_GET['error'] === 'wrongpassword'){
                echo "<p class='text-danger'>Please enter the correct password</p>";
            }
        }?>
        <form action="include/venuelogin.inc.php" method="POST">
            <label for="email">E-Mail</label>
            <input class = "form-control" type="text" id="email" name="email" value="<?php echo $email?>" placeholder="Enter your venue email address" />
            <label for="password">Password</label>
            <input class = "form-control" type="password" id="password" name="password" placeholder="Enter your venue password"/>
            <input class=" btn btn-primary" type="submit" name="submit" id="submit" value="Login"/>
        </form>
    </div>
  </div>

<?php include ('footer.php'); ?>
