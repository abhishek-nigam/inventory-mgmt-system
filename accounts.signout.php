<?php

    require './inc.core.php';

    session_destroy();

    if(isset($http_referer))
    {
        header("Location: $http_referer");
    }
    else
    {
        header("Location: './index.php");
    }
    
?>