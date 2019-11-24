<?php include('include/signupheader.php'); ?>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="customersignup.php">Player</a></li>
            <li class="nav-item">
                <a class="nav-link" href="venuesignup.php">Facility</a>
            </li>
        </ul>
        <form action="include/customersignup.inc.php" method="POST" enctype="multipart/form-data">
            <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == 'emptyfeilds'){
                        echo "<p class='text-danger'>Please fill all the fields</p>";
                    }
                    else if($_GET['error'] == 'invalidemail'){
                        echo "<p class='text-danger'>Please enter a valid email</p>";
                    }
                    else if($_GET['error'] == 'passwordsdonotmatch'){
                        echo "<p class='text-danger'>Your passwords do not match</p>";
                    }
                    else if($_GET['error'] == 'userexists'){
                        echo "<p class='text-danger'>User already exists</p>";
                    }
                }
            ?>
            <label for="name">Profile Picture</label>
            <input class = "form-control" type="file" id="name" name="file" placeholder="Enter your first name" />
            <label for="name">Name</label>
            <input class = "form-control" type="text" id="name" name="name" value="<?php echo $name;?>" placeholder="Enter your first name" />
            <small id="nMessage" class="form-text text-muted"></small>
            <label for="email">E-Mail</label>
            <input class = "form-control" type="text" id="email" name="email" value="<?php echo $email;?>" placeholder="Enter your email address" />
            <small id="eMessage" class="form-text text-muted"></small>
            <label for="password">Password</label>
            <input class = "form-control" type="password" id="password" name="password" placeholder="Enter your password"/>
            <label for="cPassword">Confirm Password</label>
            <input class = "form-control" type="password" id="cPassword" name="cPassword" value="" placeholder="Confirm your password"/>
            <small id="passwordMessage" class="form-text text-muted"></small>
            <input class="btn btn-primary" type="submit" name="submit" id="submit"/>
        </form>
    </div>
  </div>
</div>
<?php include ('footer.php'); ?>