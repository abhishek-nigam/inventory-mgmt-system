<?php require './inc.core.php' ?>

<!doctype html>
<html lang="en">
<head>
<!--HEAD-->
    <?php require './inc.head.php' ?>
</head>
<body>


<?php
    
    if(!logged_in())
    {
        if(
            isset($_POST['username']) &&
            isset($_POST['password']) &&
            isset($_POST['password_again']) &&
            isset($_POST['firstname']) &&
            isset($_POST['lastname'])
        )
        {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $password_again = trim($_POST['password_again']);
            $password_hash = md5($password);
            
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);

            if(
                !empty($username) &&
                !empty($password) &&
                !empty($password_again) &&
                !empty($firstname)
                // && !empty($lastname)  //removed lastname to be compulsary
            )
            {
               if((strlen($username)>30) || (strlen($firstname)>40) || (strlen($lastname)>40))
                {
                    $notification =  "Please adhere to maxlength of fields";
                } 
                else
                {
                    if($password != $password_again)
                    {
                        $notification = "Passwords must match";
                    }
                    else
                    {
                        $query = "SELECT `username` FROM `users` WHERE `username`='".mysqli_real_escape_string($conn,$username)."' ;";

                        if($result = mysqli_query($conn,$query))
                        {
                            $row_count = mysqli_num_rows($result);

                            if($row_count != 0)
                            {
                                $notification = "This username already exists<br>Try a different one";
                            }
                            else
                            {
                                $query = "INSERT INTO `users` VALUES ('','".mysqli_real_escape_string($conn,$username)."','".mysqli_real_escape_string($conn,$password_hash)."','".mysqli_real_escape_string($conn,$firstname)."','".mysqli_real_escape_string($conn,$lastname)."') ;";

                                if($result = mysqli_query($conn,$query))
                                {
                                    header('Location: accounts.signup_success.php');
                                }
                                else
                                {
                                    $notification = "Sorry we couldn't register you at this moment. Please try again later.";
                                }
                            }
                        }
                    }
                }
            }
            else
            {
                $notification = 'All fields are required';
            }
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

                            <h1 class="title">Sign Up</h1>
                            <h2 class="subtitle">Register to access this portal</h2>
                            
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
                                    <p class="help is-primary">This field is required</p>
                                </div>

                                <div class="field">
                                    <div class="label">Password</div>
                                    <div class="control has-icons-left">
                                        <input type="password" class="input" placeholder="Enter password" name="password">
                                        <span class="icon is-small is-left"><i class="fa fa-key"></i></span>
                                    </div>
                                    <p class="help is-primary">This field is required</p>
                                </div>

                                <div class="field">
                                    <div class="label">Password again:</div>
                                    <div class="control has-icons-left">
                                        <input type="password" class="input" placeholder="Enter password again" name="password_again">
                                        <span class="icon is-small is-left"><i class="fa fa-key"></i></span>
                                    </div>
                                    <p class="help is-primary">This field is required</p>
                                </div>

                                <div class="field">
                                    <div class="label">First Name:</div>
                                    <div class="control">
                                        <input type="text" class="input" placeholder="Enter first name" maxlength="40" value="<?php if(isset($firstname)) { echo $firstname; }?>" name="firstname">
                                    </div>
                                    <p class="help is-primary">This field is required</p>
                                </div>

                                <div class="field">
                                    <div class="label">Last Name:</div>
                                    <div class="control">
                                        <input type="text" class="input" placeholder="Enter last name" maxlength="40" value="<?php if(isset($lastname)) { echo $lastname; }?>" name="lastname">
                                    </div>
                                </div>

                                <div class="field submit-container">
                                    <input type="submit" value="Sign Up" class="button is-success">
                                </div>

                            </form>

                        </div><!-- end box-->
                
                
                <?php } else { ?>
                    <div class="notification is-warning">
                        You are already logged in.<br>
                        Please <a href="./accounts.signout.php">sign out</a> to register.
                    </div>
                <?php } ?>

            </div><!-- end column-->
        </div><!--- end columns-->

    </div><!--end container-->

<!--FOOTER-->
    <?php require './inc.footer.php' ?>
</body>
</html>
