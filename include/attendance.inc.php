<?php
    require_once ("../initialize.php");
    require_once ("../database.php");

    if(isset($_POST['submit'])) {

        global $conn;

        $bookingid = mysqli_real_escape_string($conn, $_POST['bookingid']);
        $attendance = mysqli_real_escape_string($conn, $_POST['attendance']);

        $sql = "UPDATE booking SET attendance = '$attendance' WHERE booking_id = '$bookingid'";
        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);

        redirect_to('../venueprofilebookingshistory.php?');

        }
