<?php require 'inc.core.php' ?>

<!doctype html>
<html lang="en">
<head>
<!--HEAD-->
    <?php require 'inc.head.php' ?>
</head>
<body>

<!--HEADER/NAVBAR-->
    <?php require 'inc.header.php' ?>

<?php
    
    if(isset($_GET['table_name']))
    {   $table_name = $_GET['table_name'];  }
    
    if(isset($_GET['action']))
    {   $action = $_GET['action'];  }
    
    if(logged_in())
    {
    //////////////// S T A R T /////////////////////
?>

<!--/////////// DISPLAY CONTENT ////////////// -->

<div class="container">
    <div class="columns">
        
        <div class="column is-4-desktop is-offset-4-desktop is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">

            <div class="notification is-success">
                <?php if(isset($table_name) && isset($action))
                    {
                ?>
                    
                <?php
                        if($action == 'add')
                        {
                ?>
                            Record add to table '<?php echo $table_name; ?>' successfully.<br>
                <?php
                        }
                        else if($action == 'update')
                        {
                ?>
                            Record updated in table '<?php echo $table_name; ?>' successfully.<br>
                <?php
                        } // end action only if
                ?>
                            <a href="<?php echo 'table.'.$table_name.'.php'?>">Go</a> to record list.
                <?php 
                    } 
                    else
                    {
                ?>
                        Record added to table successfully.<br>
                        <a href="../index.php">Go</a> to homepage.
                <?php
                    } // end table_name and action if
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