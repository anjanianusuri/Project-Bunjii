<?php

//     require_once ("initialize.php");
//     require_once ("database.php");
//     global $conn;
//    // $id = $_SESSION['id'];

    $venue_name=$_POST['venue_name'];
    $court_name=$_POST['court_name'];
    $player_name=$_POST['player_name'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $customer_id=$_POST['customer_id'];
    $venue_id=$_POST['venue_id'];
    
    //        if(isset($_POST['Submit'])) {
    //        global $conn;
    //        $insertquery = "insert into bookings(player_name, court_name, venue_name, date, time, customer_id, venue_id) values('$player_name', '$court_name', '$venue_name', '$date','$time','$customer_id,'$venue_id')";
    //        $result=mysqli_query($conn,$insertquery);
    //        echo '<meta http-equiv="refresh" content="0; url=customerprofile.php">';
    //        mysqli_close($conn);
    //     }    

    $user='root';
    $pass='';
    $db='project';
    
    $con=mysqli_connect('localhost',$user, $pass, $db);
    if($con)
        echo 'successful';
        $venue_name=$_POST['venue_name'];
        $court_name=$_POST['court_name'];
        $player_name=$_POST['player_name'];
        $date=$_POST['date'];
        //$date = STR_TO_DATE('$date', '%m/%d/%Y');
        $time=$_POST['time'];
        $customer_id=$_POST['customer_id'];
        $venue_id=$_POST['venue_id'];
        $court_id=$_POST['court_id'];
     //$sql="insert into bookings (player_name, court_name, venue_name, date, time, customer_id, venue_id, court_id) values('$player_name', '$court_name', '$venue_name', '$date','$time','$customer_id,'$venue_id','$court_id')";
     $sql="insert into bookings (player_name, court_name, venue_name, date, time, customer_id, venue_id, court_id) values('$player_name', '$court_name', '$venue_name', '$date', '$time', '$customer_id', '$venue_id', '$court_id')";
     $query=mysqli_query($con,$sql);
    if($query)
    echo $date;
    header("refresh:2; url=index.php");

?>