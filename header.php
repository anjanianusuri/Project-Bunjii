<?php
    session_start();
    if(!isset($page_title)){ $page_title = 'Bunjii';}
    if(!isset($home)){ $home = '';}
    if(!isset($facilities)){ $facilities = '';}
    if(!isset($about)){ $about = '';}
    if(!isset($contact)){ $contact = '';}
        ?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title><?php echo $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/functions.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <a class="nav-brand" href="index.php">
    <img src="images/logo.jpg" style="width:60px;"/>
    </a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link <?php echo $home ?>" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link <?php echo $facilities ?>" href="facilities.php">Facilities</a></li>
        <li class="nav-item"><a class="nav-link <?php echo $about ?>" href="about.php">About Us</a></li>
        <li class="nav-item"><a class="nav-link <?php echo $contact ?>" href="contact.php">Contact Us</a></li>
    </ul>
    <?php if(isset($_SESSION['user'])){ ?>
        <a class="btn btn-primary my-2 my-sm-0 menubuttons" href="profilecheck.php" name="profile">Profile</a>
     
        <a class="btn btn-primary my-2 my-sm-0 menubuttons" href="logout.php" name="logout">Logout</a>
       
    <?php } else{ ?>
        <a class="btn btn-primary  my-2 my-sm-0 menubuttons" href="login.php" name="login">Login</a>
        <a class="btn btn-primary my-2 my-sm-0 menubuttons" href="customersignup.php" name="signup">Sign Up</a>
    <?php }?>

</nav>

<main>
