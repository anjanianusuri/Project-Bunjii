<?php

    require_once ("../initialize.php");
    require_once ("../database.php");

    if(isset($_POST['submit'])) {

        global $conn;


        $file_name=$_FILES['file']['name'];
        $file_type=$_FILES['file']['type'];
        $file_size=$_FILES['file']['size'];
        $file_tem_loc=$_FILES['file']['tmp_name'];
        $file_store="uploads/".$file_name;
        move_uploaded_file($file_tem_loc,$file_store);

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cPassword = mysqli_real_escape_string($conn, $_POST['cPassword']);

        if (empty($name) || empty($email) || empty($password)) {
            redirect_to('../customersignup.php?error=emptyfeilds&name=' . $name . '&email=' . $email);
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            redirect_to('../customersignup.php?error=invalidemail&name=' . $name);
        }
        else if ($password != $cPassword) {
            redirect_to('../customersignup.php?error=passwordsdonotmatch&name=' . $name . '&email=' . $email);
        }
        else {

            $sql = "select * from users where email='$email'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                redirect_to('../customersignup.php?error=userexists&name='.$name);
            }

            else{
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $type = 'customer';
                $sql = "insert into users(name, email, password, type) values('$name', '$email', '$hashedPwd', '$type')";
                $result = mysqli_query($conn, $sql);

                // Fetching signupid from users table to insert values into customer table

                $signupsql = "select * from users where email='$email'";
                $signupresult = mysqli_query($conn, $signupsql);
                $signuprow = mysqli_fetch_assoc($signupresult);

                $signupid = $signuprow['signupid'];

               
                $profilesql = "insert into customer(signupid, customer_name, customer_email,customer_profpic) values('$signupid', '$name', '$email','$file_name')";
                $profileresult = mysqli_query($conn, $profilesql);

                mysqli_close($conn);
                redirect_to('../login.php?login=success');
            }
        }
    }
