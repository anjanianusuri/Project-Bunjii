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
    <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link <?php echo $home ?>" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link <?php echo $facilities ?>" href="facilities.php">Facilities</a></li>
        <li class="nav-item"><a class="nav-link <?php echo $about ?>" href="#">About Us</a></li>
        <li class="nav-item"><a class="nav-link <?php echo $contact ?>" href="#">Contact Us</a></li>
    </ul>
    <?php if(isset($_SESSION['user'])){ ?>
        <a class="btn btn-primary my-2 my-sm-0 menubuttons" href="profilecheck.php" name="profile">Profile</a>
        <a class="btn btn-primary my-2 my-sm-0 menubuttons" href="include/logout.inc" name="logout">Logout</a>
    <?php } else{ ?>
        <a class="btn btn-primary  my-2 my-sm-0 menubuttons" href="login.php" name="login">Login</a>
        <a class="btn btn-primary my-2 my-sm-0 menubuttons" href="signup.php" name="signup">Sign Up</a>
    <?php }?>

</nav>

<main>
