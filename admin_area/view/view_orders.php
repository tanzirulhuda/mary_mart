<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Orders
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Orders
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Name</th>
                                <th> Phone: </th>
                                <th> Vendor name </th>
                                <th> Product: </th>
                                <th> Price: </th>
                                <th> Qty: </th>
                                <th> O. Time: </th>
                                <th> Invoice No: </th>
                                <th> Total: </th>
                                <th> D. time: </th>
                                <th> D. Date: </th>
                                <th> Address: </th>
                                <th> Status: </th>
                                <th colspan="2"> Action: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                                                <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_orders = "select * from pending_orders";
                                
                                $run_orders = mysqli_query($conn,$get_orders);
          
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $order_id = $row_order['order_id'];

                                    $customer_order = $row_order['customer_order'];
                                    
                                    $c_id = $row_order['customer_id'];

                                    $delivery_time = $row_order['delivery_time'];

                                    $delivery_date = $row_order['delivery_date'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $product_id = $row_order['pro_id'];
                                    
                                    $qty = $row_order['qty'];
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $get_products = "select * from products where id='$product_id'";
                                    
                                    $run_products = mysqli_query($conn,$get_products);
                                    
                                    $row_products = mysqli_fetch_array($run_products);
                                    
                                    $product_title = $row_products['p_title'];

                                    $price = $row_products['p_price'];

                                    $vendor_id = $row_products['vendor_id'];

                                    $get_vendor = "select * from vendors where id='$vendor_id'";

                                    $run_vendor = mysqli_query($conn, $get_vendor);

                                    $row_vendor = mysqli_fetch_array($run_vendor);

                                    $vendor_name = $row_vendor['name'];
                                    
                                    $get_customer = "select * from customers where customer_id='$c_id'";
                                    
                                    $run_customer = mysqli_query($conn,$get_customer);
                                    
                                    $row_customer = mysqli_fetch_array($run_customer);

                                    $customer_name = $row_customer['customer_name'];

                                    $delivery_address = $row_customer['customer_address'];
                                    
                                    $customer_Phone = $row_customer['customer_phone'];
    
                                    $order_date = $row_order['order_date'];
                                    
                                    $order_amount = $row_order['due_amount'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td><?php echo $customer_name; ?></td>
                                <td> <?php echo $customer_Phone; ?> </td>
                                <td> <?php echo $vendor_name; ?> </td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $price; ?> </td>
                                <td> <?php echo $qty; ?></td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $invoice_no; ?></td>
                                <td> <?php echo $order_amount; ?> </td>
                                <td><?php echo $delivery_time ?></td>
                                <td><?php echo $delivery_date ?></td>
                                <td><?php echo $delivery_address; ?></td>
                                <td>
                                    
                                    <?php 
                                    
                                        if($order_status=='In progress'){
                                            
                                            echo $order_status='pending';
                                            
                                        }else{
                                            
                                            echo $order_status='Complete';
                                            
                                        }
                                    
                                    ?>
                                    
                                </td>
                                <td>  
                                     <a onclick="return confirm('Are you sure?')" href="index.php?delete_order=<?php echo $customer_order; ?>"> Delete </a>   
                                </td>
                                <td><a href="index.php?delivered_order=<?php echo $customer_order; ?>"> Delivered </a></td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>
