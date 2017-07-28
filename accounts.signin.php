<?php require './inc.core.php' ?>

<!doctype html>
<html lang="en">
<head>
<!--HEAD-->
    <?php require './inc.head.php' ?>
</head>
<body>


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
                    //This for loop runs only once
                    foreach($result as $row)
                    {
                        $user_id = $row['id'];
                        $_SESSION['user_id'] = $user_id;

                        header("Location: index.php");                        
                    }
                }
                else
                {
                    /*
                     * Runs when db returns more than one row for a particular combination of username and password.(Possibly didn't handle while registering)
                     * */
                    $notification = 'Unhandled server error';
                }
            }
            else
            {
                die('Error: '.mysqli_error($conn));
            }
        }
        else
        {
            $notification = 'You must give a username and password';
        }
    }
?>

<!--MAIN BODY CONTENT  -->

<!--HEADER/NAVBAR-->
    <?php require './inc.header.php' ?>

    <div class="container">

        <div class="columns">
            <div class="column is-4-desktop is-offset-4-desktop is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">

                <?php if(!logged_in()) { ?>
                    <div class="box">

                        <h1 class="title">Sign In</h1>
                        <h2 class="subtitle">Login to access the portal</h2>
                        
                        <?php if(isset($notification)) { ?>
                            <div class="notification">
                                <p><?php echo $notification ?></p>
                            </div>
                        <?php } ?> 

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
                        <p><small>Don't have a account?<br><a href="./accounts.signup.php">Sign up</a> to create a new account.</small></p>

                    </div><!-- end box-->


                <?php } else { ?>
                    <div class="notification is-success">
                        You are already logged in.<br>
                        Please <a href="./accounts.signout.php">sign out</a> to sign in again as a different user.
                    </div>
                <?php } ?>

                

            </div><!-- end column-->
        </div><!--- end columns-->

    </div><!--end container-->

<!--FOOTER-->
    <?php require './inc.footer.php' ?>
</body>
</html>
