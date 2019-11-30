<?php
    require_once ("../initialize.php");
    require_once ("../database.php");

    if(isset($_POST['submit'])) {

        global $conn;

        $customerid = mysqli_real_escape_string($conn, $_POST['customer_id']);
        $customername = mysqli_real_escape_string($conn, $_POST['customer_name']);
        $customerage = mysqli_real_escape_string($conn, $_POST['customer_age']);
        $customergender = mysqli_real_escape_string($conn, $_POST['customer_gender']);
        $customerphone = mysqli_real_escape_string($conn, $_POST['customer_phone']);
        $customeraddress = mysqli_real_escape_string($conn, $_POST['customer_address']);
        $customerinterests = mysqli_real_escape_string($conn, $_POST['customer_interests']);
        $customerdesc = mysqli_real_escape_string($conn, $_POST['customer_desc']);

        $sql = "UPDATE customer SET customer_name='$customername',customer_age='$customerage',customer_gender='$customergender',customer_phone='$customerphone',
        customer_address='$customeraddress',customer_interests='$customerinterests',customer_desc='$customerdesc' WHERE customer_id='$customerid'";
        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);

        redirect_to('../customerprofile.php?');

        }
