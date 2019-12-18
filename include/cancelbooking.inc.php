<?php
    require_once ("../initialize.php");
    require_once ("../database.php");

    if(isset($_POST['no'])) {

        redirect_to('../venueprofilebookings.php?');

      }

      else {

        global $conn;

        $bookingid = mysqli_real_escape_string($conn, $_POST['bookingid']);

        $sql = "DELETE FROM booking WHERE booking_id='$bookingid'";
        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);

        redirect_to('../venueprofilebookings.php?');

        }
