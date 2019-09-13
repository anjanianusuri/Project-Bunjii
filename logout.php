<?php

  //  require_once ("../initialize.php");

    session_start();
    session_unset();
    session_destroy();
   include('index.php');
?>