<?php

    require_once ("initialize.php");
    require_once ("database.php");
    global $conn;
   // $id = $_SESSION['id'];

   

    if(isset($_POST['submit'])) {
        global $conn;
        $file_name=$_FILES['file']['name'];
        $file_type=$_FILES['file']['type'];
        $file_size=$_FILES['file']['size'];
        $file_tem_loc=$_FILES['file']['tmp_name'];
        $file_store="include/uploads/".$file_name;
        move_uploaded_file($file_tem_loc,$file_store);

        $updateqry = mysqli_query($conn,"update venue set venue_image = '$file_name' where venue_id = '".$_POST['venue_id']."'");
        echo '<meta http-equiv="refresh" content="0; url=venueprofile.php">';
        mysqli_close($conn);
    }
    ?>
