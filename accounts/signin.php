<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/dmrc';
?>

<!doctype html>
<html lang="en">
<head>
<!--HEAD-->
    <?php require $path.'/include/inc.head.php' ?>
</head>
<body>

<!--HEADER/NAVBAR-->
    <?php require $path.'/include/inc.header.php' ?>

    <div class="container">

        <div class="columns">
            <div class="column is-4-desktop is-offset-4-desktop is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">

                <div class="box">

                    <h1 class="title">Sign In</h1>
                    <h2 class="subtitle">Login to access the portal</h2>
                    <div class="notification">
                        <p>Your credentials are incorrect.</p>
                        <p>Please enter again.</p>
                    </div>
                    <form action="">

                        <div class="field">
                            <div class="label">Username</div>
                            <div class="control has-icons-left">
                                <input type="text" class="input" placeholder="Enter username">
                                <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                            </div>
                        </div>

                        <div class="field">
                            <div class="label">Password</div>
                            <div class="control has-icons-left">
                                <input type="text" class="input" placeholder="Enter password">
                                <span class="icon is-small is-left"><i class="fa fa-key"></i></span>
                            </div>
                        </div>

                        <div class="field submit-container">
                            <input type="submit" value="Sign In" class="button is-success">
                        </div>

                    </form>

                </div><!-- end box-->

            </div><!-- end column-->
        </div><!--- end columns-->

    </div><!--end container-->

<!--FOOTER-->
    <?php require $path.'/include/inc.footer.php' ?>
</body>
</html>