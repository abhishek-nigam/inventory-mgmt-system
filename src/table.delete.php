<?php require 'inc.core.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!--HEAD-->
    <?php require 'inc.head.php' ?>
</head>
<body>

<!--HEADER/NAVBAR-->
    <?php require 'inc.header.php' ?>

<?php
    if(logged_in())
    {
    //////////////// S T A R T /////////////////////
?>

<!--/////////// NOT DISPLAY PHP CODE ////////////// -->
<?php
    if(isset($_GET['table_name']) && !empty($_GET['table_name']) && isset($_GET['record_id']) && !empty($_GET['record_id']))
    {
        $table_name = $_GET['table_name'];
        $record_id = $_GET['record_id'];

        $query = "SELECT `ID` FROM `$table_name` WHERE `ID`=$record_id;";
        
        $result = mysqli_query($conn,$query);
        $row_count = mysqli_num_rows($result);

        if($row_count)
        {
            $query = "DELETE FROM `$table_name` WHERE `ID`=$record_id;";
            
            $result = mysqli_query($conn,$query);
            $affected_rows = mysqli_affected_rows($conn);

            if($affected_rows)
            {
                $notification_type = 'is-success';
                $notification = "<strong>Success: </strong>Deleted record with ID $record_id from table $table_name";
            }
            else
            {
                $notification_type = 'is-warning';
                $notification = "<strong>Error: </strong>Couldn't delete record with ID $record_id from table $table_name";
            } // end affected rows if
        }
        else
        {
            $notification_type = 'is-warning';
            $notification = "<strong>Error: </strong>Record with ID $record_id doesn't exist in table '$table_name'";
        } // end row count if
    }
    else
    {
        $notification_type = 'is-danger';
        $notification = "<strong>Error: </strong>Incorrect request";
    } // end get items if
?>


<!--/////////// DISPLAY CONTENT ////////////// -->
<div class="container">
    <div class="columns">
        
        <div class="column is-4-desktop is-offset-4-desktop is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">

            <div class="notification <?php echo $notification_type; ?>">
                <?php echo $notification; ?>
                <br>

                <?php
                    if(isset($http_referer))
                    {
                ?>
                        <a href="<?php echo $http_referer; ?>">Go back</a> to previous page.
                <?php
                    }
                    else
                    {
                ?>
                        <a href="../index.php">Go</a> to homepage.
                <?php
                    }
                ?>
            </div>

        </div><!-- end column-->

    </div><!--- end columns-->
</div><!--end container-->


<?php
    /////////////////// E N D ////////////////////////
    }
    else
    {
        header("Location: accounts.signin.php?redirect=true");
    } // end logged in if
?>

<!--FOOTER-->
    <?php require 'inc.footer.php' ?>
</body>
</html>