<?php

    $page_title = 'Bunjii';
    require_once("initialize.php");
    include('header.php');
    $name = isset($_GET['name']) ? $_GET['name'] : "";
    $email = isset($_GET['email']) ? $_GET['email'] : "";

?>

<div class="container">
<h1>SIGN UP</h1>
<hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
<div class="row">
<div class="col-md-5">

