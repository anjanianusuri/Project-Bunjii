<?php

    $conn = mysqli_connect('localhost', 'root', '','project');
//    $conn = mysqli_connect('localhost', 'ictatjcu_bunjii', '123zxc','ictatjcu_bunjii');

    if(!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }
