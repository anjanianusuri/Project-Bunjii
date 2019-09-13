<?php

    require_once ("initialize.php");
    require_once ("database.php");
    global $conn;
   // $id = $_SESSION['id'];

    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $interest=$_POST['interest'];
    $description=$_POST['description'];

    if(isset($_POST['submit'])) {
        global $conn;
        $updateqry = mysqli_query($conn,"update customer set customer_name = '".$_POST['name']."',customer_age = '".$_POST['age']."',customer_gender = '".$_POST['gender']."',customer_phone = '".$_POST['contact']."',customer_address = '".$_POST['address']."',customer_interests = '".$_POST['interest']."',customer_desc = '".$_POST['description']."' where customer_id = '".$_POST['cust_id']."'");
        echo '<meta http-equiv="refresh" content="0; url=customerprofile.php">';
        mysqli_close($conn);
    }
    ?>
