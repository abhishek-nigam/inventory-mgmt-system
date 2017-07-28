<?php require './inc.core.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!--HEAD-->
    <?php require './inc.head.php' ?>
    <link rel="stylesheet" href="./resources/css/style_table.css">
    <script src="./resources/js/script_table.js" defer></script>
</head>
<body>

<?php

    $query = "SELECT * FROM `computer_stock`;";
    $result = mysqli_query($conn,$query);

    if(!$result)
    {
        $notification = 'Sorry, cannot fetch records at this moment.<br>Please try again later';
    }
    else
    {
        $row_count = mysqli_num_rows($result);
    }
?>

<!--HEADER/NAVBAR-->
    <?php require './inc.header.php' ?>

<!--MAIN CONTENT  -->
    <div class="container">

        <div class="columns">
            <div class="column is-12-desktop">
                
                <div class="block">
                    <div class="level">

                        <div class="level-left">
                            <div class="level-item">
                                <h1 class="title">Computer Stock Entry</h1>
                            </div>
                        </div>

                        <div class="level-right">
                            <div class="level-item">
                                <a href="./table.computer_stock.add.php" class="button is-info"><span class="fa fa-plus"></span>&nbsp;Add</a>    
                            </div>
                        </div>

                    </div>
                </div><!--end block-->
                
                <div class="block table-container">

                    <?php if($result)
                        {
                            if($row_count==0)
                            {
                    ?>
                                
                                <div class="column is-4-desktop is-offset-4-desktop is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">
                                    <div class="notification">
                                        No records.
                                    </div>
                                </div>
                                
                    <?php   }
                            else
                            {
                    ?>
                                <table class="table is-narrow is-bordered">
                                    <thead>
                                        <th>Options</th>
                                        <th>Stock ID</th>
                                        <th>ID</th>
                                        <th>Old ID</th>
                                        <th>User Name</th>
                                        <th>Emp No</th>
                                        <th>Department</th>
                                        <th>Detail</th>
                                        <th>Serial No</th>
                                        <th>Model No</th>
                                        <th>Delivery Date</th>
                                        <th>Bill No</th>
                                        <th>PO No</th>
                                        <th>Asset No</th>
                                        <th>Indent No</th>
                                        <th>Vendor Name</th>
                                        <th>Warranty Up To</th>
                                        <th>Location</th>
                                        <th>Wing</th>
                                        <th>HOD</th>
                                        <th>In Stock</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        
                    <?php
                                        foreach($result as $row)
                                        {
                                            $stock_id = $row['Stock ID'];
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
                                            $warranty = $row['Warranty Up To'];
                                            $location = $row['Location'];
                                            $wing = $row['Wing'];
                                            $hod = $row['HOD'];
                                            $in_stock_qty = $row['In Stock Quantity'];
                                            $status = $row['Status'];

                    ?>
                                        <tr>
                    <?php                   if(logged_in())
                                            {
                    ?>
                                            <td>
                                                <span class="tag is-info options" data-table-name = "computer_stock" data-option-type="edit" data-row-id="<?php echo $id ;?>">Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-pencil"></span></span>
                                                <span class="tag is-warning options" data-table-name = "computer_stock" data-option-type="delete" data-row-id="<?php echo $id ;?>">Delete&nbsp;<span class="fa fa-trash-o"></span></span>
                                            </td>
                    <?php                   }
                    ?>
                                            <td><?php echo $stock_id ;?></td>
                                            <td><?php echo $id ;?></td>
                                            <td><?php echo $old_id ;?></td>
                                            <td><?php echo $username ;?></td>
                                            <td><?php echo $emp_no ;?></td>
                                            <td><?php echo $department ;?></td>
                                            <td><?php echo $detail ;?></td>
                                            <td><?php echo $serial_no ;?></td>
                                            <td><?php echo $model_no ;?></td>
                                            <td><?php echo $delivery_date ;?></td>
                                            <td><?php echo $bill_no ;?></td>
                                            <td><?php echo $po_no ;?></td>
                                            <td><?php echo $asset_no ;?></td>
                                            <td><?php echo $indent_no ;?></td>
                                            <td><?php echo $vendor_name ;?></td>
                                            <td><?php echo $warranty ;?></td>
                                            <td><?php echo $location ;?></td>
                                            <td><?php echo $wing ;?></td>
                                            <td><?php echo $hod ;?></td>
                                            <td><?php echo $in_stock_qty ;?></td>
                                            <td><?php echo $status ;?></td>
                                        </tr>
                    <?php               } 
                    ?>
                                    </tbody>
                                </table>
                    <?php   }
                        }
                        else
                        {
                    ?>
                            <div class="notification is-danger">
                                Cannot fetch records at this time.<br>
                                Please try again later.
                            </div>
                    <?php
                        }
                    ?>


                </div><!--end block-->
            </div><!--end column-->
        </div><!-- end columns-->

    </div>


<!--FOOTER-->
    <?php require './inc.footer.php' ?>
</body>
</html>