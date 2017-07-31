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

    if(
        isset($_POST['id']) &&
        isset($_POST['old_id']) &&
        isset($_POST['username']) &&
        isset($_POST['emp_no']) &&
        isset($_POST['department']) &&
        isset($_POST['detail']) &&
        isset($_POST['serial_no']) &&
        isset($_POST['model_no']) &&
        isset($_POST['delivery_date']) &&
        isset($_POST['bill_no']) &&
        isset($_POST['po_no']) &&
        isset($_POST['vendor_name']) &&
        isset($_POST['warranty_upto']) &&
        isset($_POST['status']) &&
        isset($_POST['asset_no']) &&
        isset($_POST['indent_no']) &&
        isset($_POST['location']) &&
        isset($_POST['wing']) &&
        isset($_POST['hod']) &&
        isset($_POST['stock_qty'])
    )
    {
        
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $department = mysqli_real_escape_string($conn,$_POST['department']);
        $detail = mysqli_real_escape_string($conn,$_POST['detail']);
        $serial_no = mysqli_real_escape_string($conn,$_POST['serial_no']);
        $model_no = mysqli_real_escape_string($conn,$_POST['model_no']);
        $delivery_date = mysqli_real_escape_string($conn,$_POST['delivery_date']);
        $bill_no = mysqli_real_escape_string($conn,$_POST['bill_no']);
        $po_no = mysqli_real_escape_string($conn,$_POST['po_no']);
        $vendor_name = mysqli_real_escape_string($conn,$_POST['vendor_name']);
        $warranty_upto = mysqli_real_escape_string($conn,$_POST['warranty_upto']);
        $status = mysqli_real_escape_string($conn,$_POST['status']);
        $asset_no = mysqli_real_escape_string($conn,$_POST['asset_no']);
        $indent_no = mysqli_real_escape_string($conn,$_POST['indent_no']);
        $location = mysqli_real_escape_string($conn,$_POST['location']);
        $wing = mysqli_real_escape_string($conn,$_POST['wing']);
        $hod = mysqli_real_escape_string($conn,$_POST['hod']);
        
        $id = mysqli_real_escape_string($conn,$_POST['id']);

        if(!empty($_POST['stock_qty']))
        { $stock_qty = mysqli_real_escape_string($conn,$_POST['stock_qty']);}
    
        if(!empty($_POST['old_id']))
        { $old_id = mysqli_real_escape_string($conn,$_POST['old_id']);}
            
        if(!empty($_POST['emp_no']))
        { $emp_no = mysqli_real_escape_string($conn,$_POST['emp_no']);}
        
        if(
            // Add all the required items here
            !empty($id)
        )
        {
            $query = "SELECT `ID` FROM `computer_stock` WHERE `ID`='$id'; ";

            $result = mysqli_query($conn,$query);
            $row_count = mysqli_num_rows($result);

            if($row_count)
            {
                $notification = 'Please enter a different ID.<br>A record with same ID already exists.';
            }
            else
            {
                $query = "INSERT INTO `computer_stock` VALUES(
                '',
                '$id',
                '$old_id',
                '$username',
                '$emp_no',
                '$department',
                '$detail',
                '$serial_no',
                '$model_no',
                '$delivery_date',
                '$bill_no',
                '$po_no',
                '$asset_no',
                '$indent_no',
                '$vendor_name',
                '$warranty_upto',
                '$location',
                '$wing',
                '$hod',
                '$stock_qty',
                '$status'
                );";

                $result = mysqli_query($conn,$query);
                
                if($result)
                {
                    header('Location: table.add_success.php?table_name=computer_stock&action=add');
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
                    <div class="label is-small">Old ID:</div>
                    <div class="control">
                        <input type="number" name="old_id" maxlength="11" placeholder="Enter old ID" class="input is-small" value="<?php if(isset($old_id)) {echo $old_id;} ?>">
                    </div>
                    <p class="help is-primary">Max length 11</p>
                </div>

                <div class="field">
                    <div class="label is-small">User Name:</div>
                    <div class="control">
                        <input type="text" name="username" maxlength="40" placeholder="Enter username" class="input is-small" value="<?php if(isset($username)) {echo $username;} ?>">
                    </div>
                    <p class="help is-primary">Max length 40</p>
                </div>

                <div class="field">
                    <div class="label is-small">Employee no:</div>
                    <div class="control">
                        <input type="number" name="emp_no" maxlength="11" placeholder="Enter employee no" class="input is-small" value="<?php if(isset($emp_no)) {echo $emp_no;} ?>">
                    </div>
                    <p class="help is-primary">Max length 11</p>
                </div>

                <div class="field">
                    <div class="label is-small">Department:</div>
                    <div class="control">
                        <input type="text" name="department" maxlength="30" placeholder="Enter department" class="input is-small" value="<?php if(isset($department)) {echo $department;} ?>">
                    </div>
                    <p class="help is-primary">Max length 30</p>
                </div>

                <div class="field">
                    <div class="label is-small">Detail:</div>
                    <div class="control">
                        <input type="text" name="detail" maxlength="50" placeholder="Enter detail" class="input is-small" value="<?php if(isset($detail)) {echo $detail;} ?>">
                    </div>
                    <p class="help is-primary">Max length 50</p>
                </div>

                <div class="field">
                    <div class="label is-small">Serial No:</div>
                    <div class="control">
                        <input type="text" name="serial_no" maxlength="20" placeholder="Enter serial no" class="input is-small" value="<?php if(isset($serial_no)) {echo $serial_no;} ?>">
                    </div>
                    <p class="help is-primary">Max length 20</p>
                </div>

            </div>

            <div class="column">

                <div class="field">
                    <div class="label is-small">Model No:</div>
                    <div class="control">
                        <input type="text" name="model_no" maxlength="20" placeholder="Enter model no" class="input is-small" value="<?php if(isset($model_no)) {echo $model_no;} ?>">
                    </div>
                    <p class="help is-primary">Max length 20</p>
                </div>

                <div class="field">
                    <div class="label is-small">Delivery Date:</div>
                    <div class="control">
                        <input type="date" name="delivery_date" placeholder="Enter delivery date" class="input is-small" value="<?php if(isset($delivery_date)) {echo $delivery_date;} ?>">
                        <p class="help is-primary">Enter date</p>
                    </div>
                </div>

                <div class="field">
                    <div class="label is-small">Bill No:</div>
                    <div class="control">
                        <input type="text" name="bill_no" maxlength="20" placeholder="Enter bill no" class="input is-small" value="<?php if(isset($bill_no)) {echo $bill_no;} ?>">
                    </div>
                    <p class="help is-primary">Max length 20</p>
                </div>

                <div class="field">
                    <div class="label is-small">PO No:</div>
                    <div class="control">
                        <input type="text" name="po_no" maxlength="20" placeholder="Enter PO no" class="input is-small" value="<?php if(isset($po_no)) {echo $po_no;} ?>">
                    </div>
                    <p class="help is-primary">Max length 20</p>
                </div>

                <div class="field">
                    <div class="label is-small">Asset No:</div>
                    <div class="control">
                        <input type="text" name="asset_no" maxlength="20" placeholder="Enter asset no" class="input is-small" value="<?php if(isset($asset_no)) {echo $asset_no;} ?>">
                    </div>
                    <p class="help is-primary">Max length 20</p>
                </div>

                <div class="field">
                    <div class="label is-small">Indent No:</div>
                    <div class="control">
                        <input type="text" name="indent_no" maxlength="20" placeholder="Enter indent no" class="input is-small" value="<?php if(isset($indent_no)) {echo $indent_no;} ?>">
                    </div>
                    <p class="help is-primary">Max length 20</p>
                </div>

                <div class="field">
                    <div class="label is-small">Vendor Name:</div>
                    <div class="control">
                        <input type="text" name="vendor_name" maxlength="40" placeholder="Enter vendor name" class="input is-small" value="<?php if(isset($vendor_name)) {echo $vendor_name;} ?>">
                    </div>
                    <p class="help is-primary">Max length 40</p>
                </div>

            </div>

            <div class="column">

                <div class="field">
                    <div class="label is-small">Warranty up to:</div>
                    <div class="control">
                        <input type="date" name="warranty_upto" placeholder="Enter warranty upto" class="input is-small" value="<?php if(isset($warranty_upto)) {echo $warranty_upto;} ?>">
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
                    <div class="label is-small">Wing:</div>
                    <div class="control">
                        <input type="text" name="wing" maxlength="20" placeholder="Enter wing" class="input is-small" value="<?php if(isset($wing)) {echo $wing;} ?>">
                    </div>
                    <p class="help is-primary">Max length 20</p>
                </div>

                <div class="field">
                    <div class="label is-small">HOD Name:</div>
                    <div class="control">
                        <input type="text" name="hod" maxlength="40" placeholder="Enter HOD" class="input is-small" value="<?php if(isset($hod)) {echo $hod;} ?>">
                    </div>
                    <p class="help is-primary">Max length 40</p>
                </div>

                <div class="field">
                    <div class="label is-small">In stock Quantity:</div>
                    <div class="control">
                        <input type="number" name="stock_qty" maxlength="11" placeholder="Enter stock quantity" class="input is-small" value="<?php if(isset($stock_qty)) {echo $stock_qty;} ?>">
                    </div>
                    <p class="help is-primary">Max length 11</p>
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

    <script src="../resources/js/script_datetime.js"></script>
<!--FOOTER-->
    <?php require 'inc.footer.php' ?>
</body>
</html>