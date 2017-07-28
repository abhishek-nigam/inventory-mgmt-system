<?php require_once './inc.core.php' ?>

<link rel="stylesheet" href="./resources/css/style_header.css">
<script src="./resources/js/script_header.js" defer></script>

<div class="navbar">

    <div class="navbar-brand">
        <a href="/dmrc" class="navbar-item">
            <img src='<?php echo "./resources/images/dmrc_logo.gif"?>' alt="DMRC Logo">
            <span id="navbar-brand-title">DMRC Service Portal</span>
        </a>

        <div class="navbar-burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="navbar-menu" id="navMenu">

        <div class="navbar-start">

            <a href="" class="navbar-item">Home</a>
            <div href="" class="navbar-item has-dropdown is-hoverable">
                <a href="" class="navbar-link is-active">Services</a>
                <div class="navbar-dropdown">

                    <a href="./table.computer_stock.php" class="navbar-item is-active">Computer Stock</a>
                    <a href="" class="navbar-item">Table 2</a>
                    <hr class="navbar-divider">
                    <a href="" class="navbar-item">More Services</a>

                </div>
            </div><!-- end dropdown navbar item-->
            <a href="" class="navbar-item">About Us</a>
            <a href="" class="navbar-item">Contact</a>

        </div><!-- end navbar start-->

        <div class="navbar-end">

            <?php if(logged_in()) {

                $firstname = get_user_field('firstname');
                
            ?>
                <div href="" class="navbar-item has-dropdown is-hoverable">
                    <a href="" class="navbar-link is-active">Hello, <?php echo $firstname ?></a>
                    <div class="navbar-dropdown">

                        <a href="" class="navbar-item is-active">Profile</a>

                    </div>
                </div><!-- end dropdown navbar item-->
            <?php } ?>
            
            <div class="navbar-item">
                
                <?php if(!logged_in()) { ?>
                    <a href="./accounts.signin.php" class="button is-primary">
                        <span class="icon"><i class="fa fa-sign-in"></i></span>
                        <span>Sign In</span>
                    </a>
                <?php } else { ?>
                    <a href="./accounts.signout.php" class="button is-primary"> 
                        <span class="icon"><i class="fa fa-sign-out"></i></span>
                        <span>Sign Out</span>
                    </a>
                <?php } ?>

            </div><!--end navbar item-->

        </div><!-- end navbar start-->

    </div><!--end navbar menu-->


</div><!-- end navbar-->

<br>
<br>