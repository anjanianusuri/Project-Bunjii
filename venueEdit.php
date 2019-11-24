<?php

    require_once ("initialize.php");
    require_once ("database.php");
    global $conn;
   // $id = $_SESSION['id'];

    if(isset($_POST['submit'])) {
        global $conn;
        $updateqry = mysqli_query($conn,"update venue set venue_name = '".$_POST['venue_name']."',venue_desc = '".$_POST['venue_desc']."',venue_phone = '".$_POST['venue_phone']."',venue_type = '".$_POST['venue_type']."' where venue_id = '".$_POST['venue_id']."'");
        echo '<meta http-equiv="refresh" content="0; url=venueprofile.php">';
        echo "success";
        mysqli_close($conn);
    }
    ?>
