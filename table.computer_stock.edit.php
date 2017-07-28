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
    
    if(isset($_GET['record_id']))
    {
        $record_id = $_GET['record_id'];

        $query = "SELECT * FROM `computer_stock` WHERE `ID`='$record_id'; ";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            //This loop runs only once
            foreach($result as $row)
            {
                $id = $row['ID'];
                $old_id = $row['Old ID'];
                $username = $row['Username'];
                $emp_no = $row['Emp No'];
                $department = $row['Department'];
                $detail = $row['Detail'];
                $serial_no = $row['Serial No'];
                $model_no = $row['Model No'];
                $delivery_date = $row['Delivery Date'];
                $bill_no = $row['Bill No'];
                $po_no = $row['PO No'];
                $asset_no = $row['Asset No'];
                $indent_no = $row['Indent No'];
                $vendor_name = $row['Vendor Name'];
                $warranty_upto = $row['Warranty Up To'];
                $location = $row['Location'];
                $wing = $row['Wing'];
                $hod = $row['HOD'];
                $stock_qty = $row['In Stock Quantity'];
                $status = $row['Status'];
            } // end foreach loop
        }
        else
        {
            $notification = 'Record cannot be loaded at this moment.<br>Please try again later';
        } // end query result if
    } // end record id get item if
?>


<?php

    if(
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
        

        if(!empty($_POST['stock_qty']))
        { $stock_qty = mysqli_real_escape_string($conn,$_POST['stock_qty']);}
    
        if(!empty($_POST['old_id']))
        { $old_id = mysqli_real_escape_string($conn,$_POST['old_id']);}
            
        if(!empty($_POST['emp_no']))
        { $emp_no = mysqli_real_escape_string($conn,$_POST['emp_no']);}
        
        $id = $record_id;

        if(
            //Enter all required fields here
            true//!empty($id)
        )
        {
            $query = "SELECT `ID` FROM `computer_stock` WHERE `ID`='$id'; ";

            $result = mysqli_query($conn,$query);

            if($result)
            {
                
                $query = "UPDATE `computer_stock` SET
                `Old ID` = '$old_id',
                `Username` = '$username',
                `Emp No` = '$emp_no',
                `Department` = '$department',
                `Detail` = '$detail',
                `Serial No` = '$serial_no',
                `Model No` = '$model_no',
                `Delivery Date` = '$delivery_date',
                `Bill No` = '$bill_no',
                `PO No` = '$po_no',
                `Asset No` = '$asset_no',
                `Indent No` = '$indent_no',
                `Vendor Name` = '$vendor_name',
                `Warranty Up To` = '$warranty_upto',
                `Location` = '$location',
                `Wing` = '$wing',
                `HOD` = '$hod',
                `In Stock Quantity` = '$stock_qty',
                `Status` = '$status'
                WHERE `ID`='$id' ;";

                $result = mysqli_query($conn,$query);
                $rows_affected = mysqli_affected_rows($conn);

                if($rows_affected)
                {
                    header('Location: table.add_success.php?table_name=computer_stock&action=update');
                }
                else
                {
                    $notification = 'Record cannot be updated at this moment.<br>Please try again later';
                } // end rows affected if
                
            }
            else
            {
                $notification = "Sorry we couldn't find the associated record at this moment.<br>Please try again later.";
            } // end query result if
        }
        else
        {
            $notification = 'You need to enter all the required fields.';
        } // end required items if
    } // end post items if

?>



<!--/////////// DISPLAY CONTENT ////////////// -->

<div class="container">

    <div class="columns">
        <div class="column is-12-desktop is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">
            <h1 class="title">Update record details</h1>
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

    <?php
        if(isset($_GET['record_id']))
        {
    ?>

            <form action="<?php echo $current_file ?>?record_id=<?php echo $record_id?>" method="POST" class="column is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">
            <div class="columns">


                <div class="column">
                
                    <div class="field">
                        <div class="label is-small">ID:</div>
                        <div class="control">
                            <input type="number" name="id" maxlength="11" placeholder="Enter ID" class="input is-small" value="<?php if(isset($id)) {echo $id;} ?>" disabled>
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
                            <input type="submit" value="Update" class="button is-success">
                        </p>
                        <p class="control">
                            <input type="reset" value="Reset" class="button is-danger">
                        </p>
                    </div>

                </div> 
            
            
            </div>
            </form>
    <?php
        }
        else
        {
    ?>
            <div class="column is-4-desktop is-offset-4-desktop is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">
                <div class="notification is-warning">
                    <strong>Error: </strong>Incorrect request
                </div>
            </div>
    <?php
        } //end record_id get item if
    ?>


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

<!--FOOTER-->
    <?php require './inc.footer.php' ?>
</body>
</html>