<?php

    require_once ("../initialize.php");
    require_once ("../database.php");

    if(isset($_POST['submit'])) {

        global $conn;

        $target ="uploads/".basename($_FILES['image']['name']);

        $image = $_FILES['image']['name'];
        $venueid = $_POST['venueid'];

        $sql = "INSERT INTO GALLERY (venue_id, venue_image) VALUES ('$venueid','$image')";
        $sqlResult = mysqli_query($conn, $sql);

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
          $msg = "Image Uploaded successfully";
        }
        else {
          $msg = "There was a problem uploading the image";
        }

        redirect_to('../venueprofilegallery.php?add=success');
    }
    ?>
