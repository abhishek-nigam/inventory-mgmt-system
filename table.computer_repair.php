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
                $records_limit = 5;    
            }
        }
        else
        {
            $records_limit = 5;
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

    // Also change queries rewritten for pagination
    if(isset($search))
    {   
        $search_safe = mysqli_real_escape_string($conn,$search);
        $search_safe_int = intval($search_safe);

        $query_wo_limit = "SELECT * FROM `computer_repair` WHERE (`Username` LIKE '%$search_safe%') OR (`Department` LIKE '%$search_safe%') OR (`ID`=$search_safe_int) OR (`HW Detail` LIKE '%$search_safe%') OR (`Item Description` LIKE '%$search_safe%') OR (`Fault Description` LIKE '%$search_safe%') OR (`HW Part` LIKE '%$search_safe%') OR (`Status` LIKE '%$search_safe%')";
    }
    else
    {
        $query_wo_limit = "SELECT * FROM `computer_repair`";
    } // end search if
    
    if($page>=0)
    {
        $offset = $page*$records_limit;
    }
    else
    {
        $offset = 0;
    } // end page if
    
    $query = $query_wo_limit." LIMIT $records_limit OFFSET $offset"; // Final query

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
                    </div><!--end level left -->

                    <div class="level-right">
                        
                        <div class="level-item">
                            <a href="./table.computer_repair.add.php" class="button is-info"><span class="fa fa-plus"></span>&nbsp;Add</a>    
                        </div>

                        <!--Resets page  -->
                        <form style="margin-bottom: 0;" class="level-item field has-addons" action="<?php echo $current_file; ?>">
                            <div class="control">
                                <input type="search" name="q" class="input" value="<?php if(isset($search)){ echo $search ;}?>">
                            </div>
                            <div class="control">
                                <a href="" class="button is-info">Search</a>
                            </div>
                            <input type="hidden" name="limit" value="<?php echo $records_limit; ?>">
                        </form><!-- end level item form-->

                        <!--Resets page  -->
                         <form class="level-item field has-addons" id="results-per-page-form" action="<?php echo $current_file; ?>"> 
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
                            <?php
                                if(isset($search))
                                {
                                    echo "<input type='hidden' name='q' value=".$search.">";
                                }
                            ?>
                        </form><!-- end level item form-->

                    </div><!--end level right-->

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
                    } // end page if
                    
                    if(isset($search))
                    {   
                        $search_safe = mysqli_real_escape_string($conn,$search);
                        $search_safe_int = intval($search_safe);

                        $query_total_no = "SELECT COUNT(*) AS 'total' FROM `computer_repair` WHERE (`Username` LIKE '%$search_safe%') OR (`Department` LIKE '%$search_safe%') OR (`ID`=$search_safe_int) OR (`HW Detail` LIKE '%$search_safe%') OR (`Item Description` LIKE '%$search_safe%') OR (`Fault Description` LIKE '%$search_safe%') OR (`HW Part` LIKE '%$search_safe%') OR (`Status` LIKE '%$search_safe%')";
                    }
                    else
                    {
                        $query_total_no = "SELECT COUNT(*) AS 'total' FROM `computer_repair`";
                    } // end search if
                    
                    $result = mysqli_query($conn,$query_total_no);

                    if($result)
                    {
                        $result_row = mysqli_fetch_assoc($result);
                        $result_total_no = $result_row['total'];

                        $remaining_records = $result_total_no - ($page + 1)*$records_limit;
                        if($remaining_records>0)
                        {
                ?>
                        <a class="pagination-next" 
                            href="<?php
    
                                        if(isset($search))
                                        {
                                            $next_page = $page + 2; // because we decrement page once for processing
                                            echo $current_file.'?q='.$search.'&limit='.$records_limit.'&page='.$next_page;       
                                        }
                                        else
                                        {
                                            $next_page = $page + 2; // because we decrement page once for processing
                                            echo $current_file.'?limit='.$records_limit.'&page='.$next_page;
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
                        } // end remaining records if
                    } // end result total no if
                    else
                    {
                        echo "Query cannot be processed";
                    }
                ?>
                
                <ul class="pagination-list">
                    <?php
                        $current_page = $page+1;
                        
                        if($result)
                        {
                            $remainder = $result_total_no%$records_limit;
                            if($remainder==0)
                            {
                                $total_pages = $result_total_no/$records_limit;
                            }
                            else
                            {
                                $total_pages = intval(($result_total_no/$records_limit) + 1);
                            }

                            echo "Page $current_page of $total_pages" ;
                        }
                        else
                        {
                            $total_pages = "Undefined";
                        }
                    ?>
                </ul><!-- end pagination list-->
            </nav><!-- end pagination nav-->



        </div><!--end column-->

    </div><!-- end columns-->
</div>




<div class="modal" id="modal">
  <div class="modal-background"></div>
  <div class="modal-content">
    <div class="box">
    
        <h1 id="modal-title" class="title is-2"></h1>
        <h2 id="modal-info" class="title is-5"></h2>
        <p>
            <a class="button is-danger is-medium" id="modal-confirm-btn">Confirm</a>
            <a class="button is-success is-medium" id="modal-cancel-btn">Cancel</a>
        </p>

    </div>
  </div>
  <button class="modal-close is-large" id="modal-bg-cancel-btn"></button>
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