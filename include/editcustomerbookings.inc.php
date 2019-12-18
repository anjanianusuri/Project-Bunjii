<?php
    require_once ("../initialize.php");
    require_once ("../database.php");

    if(isset($_POST['submit'])) {

        global $conn;

        $bookingid = mysqli_real_escape_string($conn, $_POST['bookingid']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $time = mysqli_real_escape_string($conn, $_POST['time']);

        $sql = "UPDATE booking SET date='$date',time='$time' WHERE booking_id='$bookingid'";
        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);

        redirect_to('../customerprofilebookings.php?');

        }
