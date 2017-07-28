<?php require './inc.core.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!--HEAD-->
    <?php require './inc.head.php' ?>
</head>
<body>

<!--HEADER/NAVBAR-->
    <?php require './inc.header.php' ?>

<?php
    if(isset($_GET['signout']))
    {
        if($_GET['signout'] == 'true')
        {   $signout = true; }
        else
        {   $signout = false; } // end signout true if
    }
    else
    {   $signout = false;   } // end signout if

    //////////////// S T A R T /////////////////////
?>


<!--/////////// DISPLAY CONTENT ////////////// -->
<?php
    if($signout)
    {
?>
    <div class="hero is-success">
        <div class="hero-body">
            <h1 class="title">Signout successfull.</h1>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="columns">
            
            <div class="column is-4-desktop is-offset-4-desktop is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">
                <div class="notification is-primary">
                        <a href="./accounts.signin.php?redirect=false">Sign in</a> again?
                </div>
            </div>
            
        </div>
    </div>

<?php
    }
    else
    {
        header("Location: accounts.signin.php?redirect=false");
    } // end signout if
?>


<?php
    /////////////////// E N D ////////////////////////
?>
<!--FOOTER-->
    <?php require './inc.footer.php' ?>
</body>
</html>