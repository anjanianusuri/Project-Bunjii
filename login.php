<?php
    $page_title = 'Login';
    require_once("initialize.php");
    include('header.php');
    $email = isset($_GET['email']) ? $_GET['email'] : "";
?>

<div class="container">
    <h1>LOGIN</h1>
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
        <form action="include/login.inc.php" method="POST">
            <label for="email">E-Mail</label>
            <input class = "form-control" type="text" id="email" name="email" value="<?php echo $email?>" placeholder="Enter your email address" />
            <label for="password">Password</label>
            <input class = "form-control" type="password" id="password" name="password" placeholder="Enter your password"/>
            <input class=" btn btn-primary" type="submit" name="submit" id="submit" value="Login"/>
        </form>
    </div>
  </div>

<?php include ('footer.php'); ?>
