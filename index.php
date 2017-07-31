<?php require 'src/inc.core.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!--HEAD-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>DMRC Service Portal</title>

    <link rel="stylesheet" href="resources/css/bulma.css"> 
    <link rel="stylesheet" href="resources/css/font-awesome.min.css">
</head>
<body>

<!--HEADER/NAVBAR-->
    <?php require 'src/inc.header.php' ?>

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
                        <a href="src/accounts.signin.php?redirect=false">Sign in</a> again?
                </div>
            </div>
            
        </div>
    </div>

<?php
    }
    else
    {
        header("Location: src/accounts.signin.php?redirect=false");
    } // end signout if
?>


<?php
    /////////////////// E N D ////////////////////////
?>
<!--FOOTER-->
    <?php require 'src/inc.footer.php' ?>
</body>
</html>