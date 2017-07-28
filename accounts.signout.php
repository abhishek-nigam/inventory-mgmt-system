<?php
////// PROCESSING ONLY FILE /////////

    require './inc.core.php';

    session_destroy();
    header("Location: index.php?signout=true");
?>