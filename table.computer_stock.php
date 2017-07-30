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
        if(isset($_GET['limit']))
        {
            $records_limit = abs(intval($_GET['limit']));

            if(!(($records_limit == 2) || ($records_limit == 5) || ($records_limit == 10) || ($records_limit == 20)))
            {
                $records_limit = 2;    
            }
        }
        else
        {
            $records_limit = 2;
        }
        
        if(isset($_GET['q']))
        {
            $search = $_GET['q'];
        }

        if(isset($_GET['page']))
        {
            $page = abs(intval($_GET['page']));
            $page--;
        }
        else
        {
            $page = 0;
        }
    //////////////// S T A R T /////////////////////
?>


<!--/////////// NOT DISPLAY PHP CODE ////////////// -->
<?php

    if(isset($search))
    {   
        $search_safe = mysqli_real_escape_string($conn,$search);
        $search_safe_int = intval($search_safe);

        $query_wo_limit = "SELECT * FROM `computer_stock` WHERE (`Username` LIKE '%$search_safe%') OR (`Department` LIKE '%$search_safe%') OR (`Vendor Name` LIKE '%$search_safe%') OR (`ID`=$search_safe_int) OR (`Bill No` LIKE '%$search_safe%') OR (`PO No` LIKE '%$search_safe%')";
    }
    else
    {
        $query_wo_limit = "SELECT * FROM `computer_stock`";
    } // end search if

    if($page>0)
    {
        $offset = $page*$records_limit;
        $query = $query_wo_limit." LIMIT $records_limit OFFSET $offset";
    }
    else
    {
        $query = $query_wo_limit." LIMIT $records_limit";
    }// end pagination if
    

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
                            <h1 class="title">Computer Stock Entry</h1>
                        </div>
                    </div>

                    <div class="level-right">

                        <div class="level-item">
                            <a href="./table.computer_stock.add.php" class="button is-info"><span class="fa fa-plus"></span>&nbsp;Add</a>    
                        </div>

                        <!--Resets page  -->
                        <form style="margin-bottom: 0;" class="level-item field has-addons" action="<?php echo $current_file?>?limit=<?php $records_limit ?>">
                            <div class="control">
                                <input type="search" name="q" class="input" value="<?php if(isset($search)){ echo $search ;}?>">
                            </div>
                            <div class="control">
                                <a href="" class="button is-info">Search</a>
                            </div>
                        </form><!-- end level item form-->

                        <!--Resets page  -->
                         <form class="level-item field has-addons" id="results-per-page-form" action="<?php echo $current_file?>?q=<?php if(isset($search)){echo $search;}?>"> 
                            <div class="control">
                                <a class="button is-static">No. of results / page </a>
                            </div>

                            <div class="control">
                                <span class="select">
                                    <select name="limit" id="results-per-page">
                                        <option value="2"<?php if($records_limit == 2){ echo "selected"; }?>>2</option>
                                        <option value="5"<?php if($records_limit == 5){ echo "selected"; }?>>5</option>
                                        <option value="10"<?php if($records_limit == 10){ echo "selected"; }?>>10</option>
                                        <option value="20"<?php if($records_limit == 20){ echo "selected"; }?>>20</option>
                                    </select>
                                </span>
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
                                        <td>
                                            <span class="tag is-info options" data-table-name = "computer_stock" data-option-type="edit" data-row-id="<?php echo $id ;?>">Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-pencil"></span></span>
                                            <span class="tag is-warning options" data-table-name = "computer_stock" data-option-type="delete" data-row-id="<?php echo $id ;?>">Delete&nbsp;<span class="fa fa-trash-o"></span></span>
                                        </td>
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

            <nav class="pagination">
                <?php
                    if($page>0)
                    {
                ?>
                        <a class="pagination-previous"
                            href="<?php
                                        if(isset($search))
                                        {
                                            echo $current_file.'?q='.$search.'&limit='.$records_limit.'&page='.$page;
                                        }
                                        else
                                        {
                                            echo $current_file.'?limit='.$records_limit.'&page='.$page;
                                        }           
                                  ?>">
                            Previous Page
                        </a>
                <?php
                    }
                    else
                    {
                ?>
                    <a href="#" class="pagination-previous" disabled>Previous Page</a>
                <?php
                    }
                    
                    // Current page results from $offset($page*$records_limit) to $offset + $records_limit;
                    // Hence $records_limit * ($page + 1) results shown till now
    
                    $next_page_results = ($page + 1)*$records_limit;
                    $query = $query_wo_limit." LIMIT $records_limit OFFSET $next_page_results";
                    
                    
                    $result = mysqli_query($conn,$query);

                    if($result)
                    {
                        $row_count = mysqli_num_rows($result);

                        if($row_count>0)
                        {
                ?>
                        <a class="pagination-next" 
                            href="<?php
    
                                        if(isset($search))
                                        {
                                            $page = $page + 2;
                                            echo $current_file.'?q='.$search.'&limit='.$records_limit.'&page='.$page;       
                                        }
                                        else
                                        {
                                            $page = $page + 2;
                                            echo $current_file.'?limit='.$records_limit.'&page='.$page;
                                        }           
                                  ?>">
                                  Next Page
                        </a>
                <?php
                        }
                        else
                        {
                ?>
                        <a href="#" class="pagination-next" disabled>Next Page</a>
                <?php
                        } //end row count if

                    } // end query result if
                    else
                    {
                        echo "Unable to process query";
                    }
                ?>
            </nav>
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