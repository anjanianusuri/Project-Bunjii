<?php
    require_once ("../initialize.php");
    require_once ("../database.php");

    if(isset($_POST['submit'])) {

        $venueid = mysqli_real_escape_string($conn, $_POST['venueid']);
        $venuename = mysqli_real_escape_string($conn, $_POST['venuename']);
        $courtid = mysqli_real_escape_string($conn, $_POST['courtid']);
        $courtname = mysqli_real_escape_string($conn, $_POST['courtname']);
        $customerid = mysqli_real_escape_string($conn, $_POST['customerid']);
        $customername = mysqli_real_escape_string($conn, $_POST['customername']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $time = mysqli_real_escape_string($conn, $_POST['time']);

            global $conn;

            $sql = "insert into booking (customer_id, venue_id, court_id, court_name, customer_name, time, date)
            values ('$customerid','$venueid','$courtid','$courtname','$customername','$time','$date')";
            $result = mysqli_query($conn, $sql);

            mysqli_close($conn);
          }
