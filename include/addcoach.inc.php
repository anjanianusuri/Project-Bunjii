<?php

    require_once ("../initialize.php");
    require_once ("../database.php");

    if(isset($_POST['submit'])) {

        global $conn;

        $venueid = mysqli_real_escape_string($conn, $_POST['venue_id']);
        $coachname = mysqli_real_escape_string($conn, $_POST['coach_name']);
        $coachdesc = mysqli_real_escape_string($conn, $_POST['coach_desc']);

        $sql = "insert into coaches(venue_id, coach_name, coach_desc) values('$venueid', '$coachname', '$coachdesc');";
        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);
        redirect_to('../venueprofilecoaches.php?add=success');
    }
    ?>
