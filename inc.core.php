<?php
    require './inc.connect.php';

    ob_start();
    session_start();
    $current_file = $_SERVER['SCRIPT_NAME'];

    if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
    {
        $http_referer = $_SERVER['HTTP_REFERER'];
    }

    function logged_in()
    {
        if((isset($_SESSION['user_id'])) && !empty($_SESSION['user_id']))
            return true;
        else
            return false;
    }

    function get_user_field($field)
    {
        $user_id = $_SESSION['user_id'];
        global $conn;

        $query = "SELECT `$field` FROM `users` WHERE `id`='$user_id' ;";

        if($result=mysqli_query($conn,$query))
        {
            $row_count = mysqli_num_rows($result);

            if(!$row_count)
            {
                // echo "Cannot load user data";
            }
            else if($row_count == 1)
            {
                $row = mysqli_fetch_assoc($result);
                return $row[$field];
            }
            else
            {
                // echo "oops multiple data fetched";
            }
        }
        else
        {
            // echo "Query didn't return anything;";
        }
    }

?>