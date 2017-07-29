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

<!--HEADER/NAVBAR-->
    <?php require './inc.header.php' ?>

<?php
    if(logged_in())
    {
        if(isset($_GET['q']))
        {
            $search = $_GET['q'];
        }
    //////////////// S T A R T /////////////////////
?>


<!--/////////// NOT DISPLAY PHP CODE ////////////// -->
<?php

    if(isset($search))
    {   
        $search_safe = mysqli_real_escape_string($conn,$search);
        $search_safe_int = intval($search_safe);

        $query = "SELECT * FROM `computer_repair` WHERE (`Username` LIKE '%$search_safe%') OR (`Department` LIKE '%$search_safe%') OR (`ID`=$search_safe_int) OR (`HW Detail` LIKE '%$search_safe%') OR (`Item Description` LIKE '%$search_safe%') OR (`Fault Description` LIKE '%$search_safe%') OR (`HW Part` LIKE '%$search_safe%') OR (`Status` LIKE '%$search_safe%')";
    }
    else
    {
        $query = "SELECT * FROM `computer_repair`";
    } // end search if
    
    $result = mysqli_query($conn,$query);

    if($result)
    {
        $row_count = mysqli_num_rows($result);
    } // end query result if 
?>

<!--/////////// DISPLAY CONTENT ////////////// -->
<div class="container">
    <div class="columns">
        
        <div class="column is-12-desktop">
            
            <div class="block">
                <div class="level">

                    <div class="level-left">
                        <div class="level-item">
                            <h1 class="title">Computer Repair Entry</h1>
                        </div>
                    </div>

                    <div class="level-right">
                        
                        <div class="level-item">
                            <a href="./table.computer_repair.add.php" class="button is-info"><span class="fa fa-plus"></span>&nbsp;Add</a>    
                        </div>

                        <form class="level-item field has-addons" action="<?php echo $current_file?>">
                            <div class="control">
                                <input type="search" name="q" class="input" value="<?php if(isset($search)){ echo $search ;}?>">
                            </div>
                            <div class="control">
                                <a href="" class="button is-info">Search</a>
                            </div>
                        </form><!-- end level item form-->

                    </div>

                </div><!-- end level-->
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
                                    <th>Repair ID</th>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Department</th>

                                    <th>Receipt Date</th>
                                    <th>Location</th>
                                    <th>Emp No</th>
                                    <th>Contact No</th>
                                    <th>Wing</th>                            
                                    
                                    <th>HW Detail</th>
                                    <th>Item Desciption</th>
                                    <th>Fault Desciption</th>
                                    <th>Remarks</th>
                                    <th>Warranty Up To</th>

                                    <th>Update Status</th>
                                    <th>Update Time</th>
                                    <th>Update Date</th>
                                    <th>Pending Status</th>
                                    <th>Add Date</th>

                                    <th>Email</th>
                                    <th>IT Lab</th>
                                    <th>HW Part</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    
                <?php
                                    foreach($result as $row)
                                    {
                                        $repair_id = $row['Repair ID'];
                                        $id = $row['ID'];
                                        $username = $row['Username'];
                                        $department = $row['Department'];
                                        $receipt_date = $row['Receipt Date'];
                                        $location = $row['Location'];
                                        $emp_no = $row['Emp No'];
                                        $contact_no = $row['Contact No'];
                                        $wing = $row['Wing'];
                                        $hw_detail = $row['HW Detail'];
                                        $item_descp = $row['Item Description'];
                                        $fault_descp = $row['Fault Description'];
                                        $remarks = $row['Remarks'];
                                        $warranty = $row['Warranty Up To'];
                                        $update_status = $row['Update Status'];
                                        $update_time = $row['Update Time'];
                                        $update_date = $row['Update Date'];
                                        $pending_status = $row['Pending Status'];
                                        $add_date = $row['Add Date'];
                                        $email = $row['Email'];
                                        $it_lab = $row['IT Lab'];
                                        $hw_part = $row['HW Part'];
                                        $status = $row['Status'];
                                        
                ?>
                                    <tr>
                                        <td>
                                            <span class="tag is-info options" data-table-name = "computer_repair" data-option-type="edit" data-row-id="<?php echo $id ;?>">Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-pencil"></span></span>
                                            <span class="tag is-warning options" data-table-name = "computer_repair" data-option-type="delete" data-row-id="<?php echo $id ;?>">Delete&nbsp;<span class="fa fa-trash-o"></span></span>
                                        </td>
                                        <td><?php echo $repair_id ;?></td>
                                        <td><?php echo $id ;?></td>
                                        <td><?php echo $username ;?></td>
                                        <td><?php echo $department ;?></td>
                                        <td><?php echo $receipt_date ;?></td>
                                        <td><?php echo $location ;?></td>
                                        <td><?php echo $emp_no ;?></td>
                                        <td><?php echo $contact_no ;?></td>
                                        <td><?php echo $wing ;?></td>
                                        <td><?php echo $hw_detail ;?></td>
                                        <td><?php echo $item_descp ;?></td>
                                        <td><?php echo $fault_descp ;?></td>
                                        <td><?php echo $remarks ;?></td>
                                        <td><?php echo $warranty ;?></td>
                                        <td><?php echo $update_date ;?></td>
                                        <td><?php echo $update_time ;?></td>
                                        <td><?php echo $update_date ;?></td>
                                        <td><?php echo $pending_status ;?></td>
                                        <td><?php echo $add_date ;?></td>
                                        <td><?php echo $email ;?></td>
                                        <td><?php echo $it_lab ;?></td>
                                        <td><?php echo $hw_part ;?></td>
                                        <td><?php echo $status ;?></td>
                                    </tr>
                <?php               } // end foreach 
                ?>
                                </tbody>
                            </table>
                <?php   } // end row count if
                    }
                    else
                    {
                ?>
                        <div class="column is-4-desktop is-offset-4-desktop is-10-mobile is-offset-1-mobile is-10-touch is-offset-1-touch">
                            <div class="notification is-danger">
                                Cannot fetch records at this time.<br>
                                Please try again later.
                            </div>
                        </div>
                <?php
                    } // end result if
                ?>


            </div><!--end block-->
        </div><!--end column-->

    </div><!-- end columns-->
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