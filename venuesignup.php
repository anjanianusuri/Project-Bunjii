<?php include('include/signupheader.php'); ?>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="customersignup.php">Player</a></li>
            <li class="nav-item">
                <a class="nav-link active" href="venuesignup.php">Facility</a>
            </li>
        </ul>
        <form action="include/venuesignup.inc.php" method="POST">
            <?php
                if(isset($_GET['signup']) === 'success'){
                        echo "<p class='text-success'>Thank you for signing up with us, we'll get in touch with you soon</p>";
                    }
                if(isset($_GET['error'])){
                    if($_GET['error'] === 'emptyfeilds'){
                        echo "<p class='text-danger'>Please fill all the fields</p>";
                    }
                    else if($_GET['error'] === 'invalidemail'){
                        echo "<p class='text-danger'>Please enter a valid email</p>";
                    }
                    else if($_GET['error'] === 'userexists'){
                        echo "<p class='text-danger'>You already sent a request to us, we'll get in touch with you soon</p>";
                    }
                }
            ?>
            <label for="name">Venue Name</label>
            <input class = "form-control" type="text" id="name" name="name" value="<?php echo $name;?>" placeholder="Enter your Venue Name" />
            <small id="nMessage" class="form-text text-muted"></small>
            <label for="email">E-Mail</label>
            <input class = "form-control" type="text" id="email" name="email" value="<?php echo $email;?>" placeholder="Enter your email address" />
            <small id="eMessage" class="form-text text-muted"></small>
            <label for="password">Password</label>
            <input class = "form-control" type="password" id="password" name="password" value="" placeholder="Enter your Password" />
            <small id="passwordMessage" class="form-text text-muted"></small>
            <input class="btn btn-primary" type="submit" name="submit" id="submit"/>
        </form>
    </div>
  </div>
</div>

<?php include ('footer.php'); ?>
