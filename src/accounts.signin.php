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
    if(isset($_GET['redirect']))
    {
        if($_GET['redirect'] == 'true')
        {   $redirect = true;   }
        else
        {   $redirect = false; } //end redirect true if
    }
    else
    {   $redirect = false; } // end redirect if

//////////////// S T A R T /////////////////////
?>

<!--/////////// NOT DISPLAY PHP CODE ////////////// -->

<?php
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_hash = md5($_POST['password']);

        if(!empty($username) && !(empty($password)))
        {
            $query = "SELECT `id` FROM `users` WHERE `username`='".mysqli_real_escape_string($conn,$username)."' AND `password`='".mysqli_real_escape_string($conn,$password_hash)."'";

            if($result = mysqli_query($conn,$query))
            {
                $row_count = mysqli_num_rows($result);

                if(!$row_count)
                {
                    $notification = 'Incorrect credentials. Please enter again.';
                }
                else if($row_count == 1)
                {
                    $row = mysqli_fetch_assoc($result);
                    
                    $user_id = $row['id'];
                    $_SESSION['user_id'] = $user_id;

                    header("Location: ../index.php");                        
                }
                else
                {
                     /* Runs when db returns more than one row for a particular combination of username and password.(Possibly didn't handle while registering)
                     */
                    $notification = 'Unexpected server error';
                } // end row count if
            }
            else
            {
                $notification = 'We cannot to database right now';
            } // end query result if
        }
        else
        {
            $notification = 'You must give a username and password';
        } // end empty username and password if
    } // end username and password if
?>


<!--/////////// DISPLAY CONTENT ////////////// -->

<?php if($redirect)
        {
?>
    <div class="hero is-warning">
        <div class="hero-body">
            <h1 class="title">You need to login to access this website</h1>
        </div>
    </div>

    <br>
<?php   }
?>

<div class="container">
    <div class="columns">

        <div class="column is-4-desktop is-offset-4-desktop is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">

            <?php if(!logged_in()) 
                    { 
            ?>
                    <div class="box">

                        <h1 class="title">Sign In</h1>
                        <h2 class="subtitle">Login to access the portal</h2>
                        
                        <?php if(isset($notification)) 
                                { 
                        ?>
                                <div class="notification">
                                    <p><?php echo $notification ?></p>
                                </div>
                        <?php   }
                        ?> 

                        <form action="<?php echo $current_file ?>" method="POST">

                            <div class="field">
                                <div class="label">Username</div>
                                <div class="control has-icons-left">
                                    <input type="text" class="input" placeholder="Enter username" maxlength="30" value="<?php if(isset($username)) { echo $username; }?>" name="username">
                                    <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                                </div>
                            </div>

                            <div class="field">
                                <div class="label">Password</div>
                                <div class="control has-icons-left">
                                    <input type="password" class="input" placeholder="Enter password" name="password">
                                    <span class="icon is-small is-left"><i class="fa fa-key"></i></span>
                                </div>
                            </div>

                            <div class="field submit-container">
                                <input type="submit" value="Sign In" class="button is-success">
                            </div>

                        </form>

                        <br>
                        <p><small>Don't have a account?<br><a href="accounts.signup.php">Sign up</a> to create a new account.</small></p>

                    </div><!-- end box-->


            <?php   }
                else
                    { 
            ?>
                    <div class="notification">
                        <div class="greet_img_container" style="text-align: center;">
                            <?php include '../resources/images/sun_clouds.html' ?>
                        </div>
                        <h1 class="title">Hi, there! Have a good day</h1>

                        <br>
                        <small>Sign in again as a different user? <a href="accounts.signout.php">Sign out</a>.</small>
                    </div>
            <?php 
                    } // end logged in if
            ?>

            

        </div><!-- end column-->

    </div><!--- end columns-->
</div><!--end container-->




<?php
    /////////////////// E N D ////////////////////////
?>
<!--FOOTER-->
    <?php require 'inc.footer.php' ?>
</body>
</html>
