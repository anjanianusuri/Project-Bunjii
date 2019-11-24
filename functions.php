<?php

    require_once ("database.php");

    function url_for($script_path){
        if($script_path[0] != '/'){
            $script_path = "/".$script_path;
        }
        return WWW_ROOT.$script_path;
    }

    function share_url($script_path){
        if($script_path[0] != '/'){
            $script_path = "/".$script_path;
        }
        return SHARED_ROOT.$script_path;
    }

    function redirect_to($location) {
        header("Location: " . $location);
        exit;
    }

    function h($string="") {
        return htmlspecialchars($string);
    }
    
