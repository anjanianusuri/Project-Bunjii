<?php

    require_once ("../initialize.php");
    require_once ("../database.php");

    if(isset($_POST['submit'])) {

        global $conn;

        $venueid = mysqli_real_escape_string($conn, $_POST['venue_id']);
        $photo = mysqli_real_escape_string($conn, $_POST['photo']);

        $sql = "insert into gallery(venue_id, venue_image) values('$venueid', '$photo');";
        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);
        redirect_to('../venueprofilegallery.php?add=success');
    }
    ?>
