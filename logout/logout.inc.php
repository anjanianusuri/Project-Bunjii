<?php

    require_once ("../initialize.php");

    session_start();
    session_unset();
    session_destroy();
    redirect_to('../index.php');
