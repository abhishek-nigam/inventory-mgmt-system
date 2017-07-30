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
    if(logged_in())
    {
    //////////////// S T A R T /////////////////////
?>

<!--/////////// NOT DISPLAY PHP CODE ////////////// -->
<?php

    if(
        isset($_POST['id']) &&
        isset($_POST['username']) &&
        isset($_POST['department']) &&
        isset($_POST['receipt_date']) &&
        isset($_POST['location']) &&
        isset($_POST['emp_no']) &&
        isset($_POST['contact_no']) &&
        isset($_POST['wing']) &&
        isset($_POST['hw_detail']) &&
        isset($_POST['item_descp']) &&
        isset($_POST['fault_descp']) &&
        isset($_POST['remarks']) &&
        isset($_POST['warranty']) &&
        isset($_POST['update_status']) &&
        isset($_POST['update_time']) &&
        isset($_POST['update_date']) &&
        isset($_POST['pending_status']) &&
        isset($_POST['add_date']) &&
        isset($_POST['email']) &&
        isset($_POST['it_lab']) &&
        isset($_POST['hw_part']) &&
        isset($_POST['status'])
    )
    {
        
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $department = mysqli_real_escape_string($conn,$_POST['department']);
        $receipt_date = mysqli_real_escape_string($conn,$_POST['receipt_date']);
        $location = mysqli_real_escape_string($conn,$_POST['location']);
        $wing = mysqli_real_escape_string($conn,$_POST['wing']);
        $hw_detail = mysqli_real_escape_string($conn,$_POST['hw_detail']);
        $item_descp = mysqli_real_escape_string($conn,$_POST['item_descp']);
        $fault_descp = mysqli_real_escape_string($conn,$_POST['fault_descp']);
        $remarks = mysqli_real_escape_string($conn,$_POST['remarks']);
        $warranty_upto = mysqli_real_escape_string($conn,$_POST['warranty_upto']);
        $update_status = mysqli_real_escape_string($conn,$_POST['update_status']);
        $update_time = mysqli_real_escape_string($conn,$_POST['update_time']);
        $update_date = mysqli_real_escape_string($conn,$_POST['update_date']);
        $pending_status = mysqli_real_escape_string($conn,$_POST['pending_status']);
        $add_date = mysqli_real_escape_string($conn,$_POST['add_date']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $it_lab = mysqli_real_escape_string($conn,$_POST['it_lab']);
        $hw_part = mysqli_real_escape_string($conn,$_POST['hw_part']);
        $status = mysqli_real_escape_string($conn,$_POST['status']);
        
        if(!empty($_POST['id']))
        { $id = mysqli_real_escape_string($conn,$_POST['id']);}

        if(!empty($_POST['emp_no']))
        { $emp_no = mysqli_real_escape_string($conn,$_POST['emp_no']);}
    
        if(!empty($_POST['contact_no']))
        { $contact_no = mysqli_real_escape_string($conn,$_POST['contact_no']);}

        if(
            // Add all the required items here
            !empty($id)
        )
        {
            $query = "SELECT `ID` FROM `computer_repair` WHERE `ID`='$id'; ";

            $result = mysqli_query($conn,$query);
            $row_count = mysqli_num_rows($result);

            if($row_count)
            {
                $notification = 'Please enter a different ID.<br>A record with same ID already exists.';
            }
            else
            {
                $query = "INSERT INTO `computer_repair` VALUES(
                '',
                '$id',
                '$username',
                '$department',
                '$receipt_date',
                '$location',
                '$emp_no',
                '$contact_no',
                '$wing',
                '$hw_detail',
                '$item_descp',
                '$fault_descp',
                '$remarks',
                '$warranty',
                '$update_status',
                '$update_time',
                '$update_date',
                '$pending_status',
                '$add_date',
                '$email',
                '$it_lab',
                '$hw_part',
                '$status'
                );";

                $result = mysqli_query($conn,$query);
                
                if($result)
                {
                    header('Location: table.add_success.php?table_name=computer_repair&action=add');
                }
                else
                {
                    $notification = 'Query could not be processed at this moment.<br>Please try again later';
                } // end query result if
            } // end row count if
        }
        else
        {
            $notification = 'You need to enter all the required fields.';
        } // end required items not empty if
    } // end post get items if
?>

<!--/////////// DISPLAY CONTENT ////////////// -->
<div class="container">

    <div class="columns">
        <div class="column is-12-desktop is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">
            <h1 class="title">Add new record</h1>
        </div>
    </div>

    <?php if(isset($notification))
        {
    ?>
    <div class="columns">
        <div class="column is-4-desktop is-offset-4-desktop is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">

            <div class="notification">
                <?php echo $notification ?>
            </div>

        </div><!-- end column-->
    </div><!--end columns-->
    <?php
        } // end notification if
    ?>

    <div class="columns">


        <form action="<?php echo $current_file ?>" method="POST" class="column is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">
        <div class="columns">


            <div class="column">
                
                <div class="field">
                    <div class="label is-small">ID:</div>
                    <div class="control">
                        <input type="number" name="id" maxlength="11" placeholder="Enter ID" class="input is-small" value="<?php if(isset($id)) {echo $id;} ?>">
                    </div>
                    <p class="help is-primary">Required. Max length 11</p>
                </div>

                <div class="field">
                    <div class="label is-small">User Name:</div>
                    <div class="control">
                        <input type="text" name="username" maxlength="40" placeholder="Enter username" class="input is-small" value="<?php if(isset($username)) {echo $username;} ?>">
                    </div>
                    <p class="help is-primary">Max length 40</p>
                </div>

                <div class="field">
                    <div class="label is-small">Department:</div>
                    <div class="control">
                        <input type="text" name="department" maxlength="30" placeholder="Enter department" class="input is-small" value="<?php if(isset($department)) {echo $department;} ?>">
                    </div>
                    <p class="help is-primary">Max length 30</p>
                </div>

                <div class="field">
                    <div class="label is-small">Receipt Date:</div>
                    <div class="control">
                        <input type="date" name="receipt_date" placeholder="Enter receipt date" class="input is-small" value="<?php if(isset($receipt_date)) {echo $receipt_date;} ?>">
                    </div>
                    <p class="help is-primary">Enter date</p>
                </div>

                <div class="field">
                    <div class="label is-small">Location:</div>
                    <div class="control">
                        <input type="text" name="location" maxlength="30" placeholder="Enter location" class="input is-small" value="<?php if(isset($location)) {echo $location;} ?>">
                    </div>
                    <p class="help is-primary">Max length 30</p>
                </div>

                <div class="field">
                    <div class="label is-small">Employee No:</div>
                    <div class="control">
                        <input type="number" name="emp_no" maxlength="11" placeholder="Enter employee no" class="input is-small" value="<?php if(isset($emp_no)) {echo $emp_no;} ?>">
                    </div>
                    <p class="help is-primary">Max length 11</p>
                </div>

                <div class="field">
                    <div class="label is-small">Contact No:</div>
                    <div class="control">
                        <input type="tel" name="contact_no" maxlength="11" placeholder="Enter contact no" class="input is-small" value="<?php if(isset($contact_no)) {echo $contact_no;} ?>">
                    </div>
                    <p class="help is-primary">Max length 11</p>
                </div>

                <div class="field">
                    <div class="label is-small">Wing:</div>
                    <div class="control">
                        <input type="text" name="wing" maxlength="20" placeholder="Enter wing" class="input is-small" value="<?php if(isset($wing)) {echo $wing;} ?>">
                    </div>
                    <p class="help is-primary">Max length 20</p>
                </div>

            </div>

            <div class="column">

                <div class="field">
                    <div class="label is-small">HW Detail:</div>
                    <div class="control">
                        <input type="text" name="hw_detail" maxlength="50" placeholder="Enter hardware detail" class="input is-small" value="<?php if(isset($hw_detail)) {echo $hw_detail;} ?>">
                    </div>
                    <p class="help is-primary">Max length 50</p>
                </div>

                <div class="field">
                    <div class="label is-small">Item Description:</div>
                    <div class="control">
                        <input type="text" name="item_descp" placeholder="Enter item description" maxlength="100" class="input is-small" value="<?php if(isset($item_descp)) {echo $item_descp;} ?>">
                        <p class="help is-primary">Max length 100</p>
                    </div>
                </div>

                <div class="field">
                    <div class="label is-small">Fault Description:</div>
                    <div class="control">
                        <input type="text" name="fault_descp" maxlength="100" placeholder="Enter fault description" class="input is-small" value="<?php if(isset($fault_descp)) {echo $fault_descp;} ?>">
                    </div>
                    <p class="help is-primary">Max length 100</p>
                </div>

                <div class="field">
                    <div class="label is-small">Remarks:</div>
                    <div class="control">
                        <input type="text" name="remarks" maxlength="100" placeholder="Enter remarks" class="input is-small" value="<?php if(isset($remarks)) {echo $remarks;} ?>">
                    </div>
                    <p class="help is-primary">Max length 100</p>
                </div>

                <div class="field">
                    <div class="label is-small">Warranty Up To:</div>
                    <div class="control">
                        <input type="date" name="warranty" placeholder="Enter warranty" class="input is-small" value="<?php if(isset($warranty)) {echo $warranty;} ?>">
                    </div>
                    <p class="help is-primary">Enter date</p>
                </div>

                <div class="field">
                    <div class="label is-small">Update Status:</div>
                    <div class="control">
                        <input type="text" name="update_status" maxlength="50" placeholder="Enter update status" class="input is-small" value="<?php if(isset($update_status)) {echo $update_status;} ?>">
                    </div>
                    <p class="help is-primary">Max length 50</p>
                </div>

                <div class="field">
                    <div class="label is-small">Update Time:</div>
                    <div class="control">
                        <input type="time" name="update_time" placeholder="Enter update time" class="input is-small" value="<?php if(isset($update_time)) {echo $update_time;} ?>">
                    </div>
                    <p class="help is-primary">Enter time</p>
                </div>

                <div class="field">
                    <div class="label is-small">Update Date:</div>
                    <div class="control">
                        <input type="date" name="update_date" placeholder="Enter update_date" class="input is-small" value="<?php if(isset($update_date)) {echo $update_date;} ?>">
                    </div>
                    <p class="help is-primary">Enter date</p>
                </div>

            </div>

            <div class="column">

                <div class="field">
                    <div class="label is-small">Pending Status:</div>
                    <div class="control">
                        <input type="text" name="pending_status" maxlength="50" placeholder="Enter pending status" class="input is-small" value="<?php if(isset($pending_status)) {echo $pending_status;} ?>">
                    </div>
                    <p class="help is-primary">Max length: 50</p>
                </div>
                
                <div class="field">
                    <div class="label is-small">Add Date</div>
                    <div class="control">
                        <input type="date" name="add_date" placeholder="Enter addition date" class="input is-small" value="<?php if(isset($add_date)) {echo $add_date;} ?>">
                    </div>
                    <p class="help is-primary">Enter date</p>
                </div>

                <div class="field">
                    <div class="label is-small">Email:</div>
                    <div class="control">
                        <input type="email" name="email" maxlength="50" placeholder="Enter email" class="input is-small" value="<?php if(isset($email)) {echo $email;} ?>">
                    </div>
                    <p class="help is-primary">Max length 50</p>
                </div>

                <div class="field">
                    <div class="label is-small">IT Lab:</div>
                    <div class="control">
                        <input type="text" name="it_lab" maxlength="40" placeholder="Enter IT lab" class="input is-small" value="<?php if(isset($it_lab)) {echo $it_lab;} ?>">
                    </div>
                    <p class="help is-primary">Max length 40</p>
                </div>

                <div class="field">
                    <div class="label is-small">Hardware Part:</div>
                    <div class="control">
                        <input type="text" name="hw_part" maxlength="30" placeholder="Enter hardware part" class="input is-small" value="<?php if(isset($hw_part)) {echo $hw_part;} ?>">
                    </div>
                    <p class="help is-primary">Max length 30</p>
                </div>

                <div class="field">
                    <div class="label is-small">Status:</div>
                    <div class="control">
                        <input type="text" name="status" maxlength="50" placeholder="Enter status" class="input is-small" value="<?php if(isset($status)) {echo $status;} ?>">
                    </div>
                    <p class="help is-primary">Max length 50</p>
                </div>

                <div class="field is-grouped is-grouped-centered">
                    <p class="control">
                        <input type="submit" value="Add" class="button is-success">
                    </p>
                    <p class="control">
                        <input type="reset" value="Reset" class="button is-danger">
                    </p>
                </div>

            </div> 
        
        
        </div>
        </form>

    </div>
</div>


<?php
    /////////////////// E N D ////////////////////////
    }
    else
    {
        header("Location: accounts.signin.php?redirect=true");
    } // end logged in if
?>

    <script src="./resources/js/script_datetime.js"></script>
<!--FOOTER-->
    <?php require './inc.footer.php' ?>
</body>
</html>