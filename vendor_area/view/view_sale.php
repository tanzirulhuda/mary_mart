<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View sales
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View sales
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover" id="dataTable"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Product ID: </th>
                                <th> Product Title: </th>
                                <th> Product Image: </th>
                                <th> Invoice no: </th>
                                <th> Sale Date: </th>
                                <th> Product Price: </th>
                                <th> Mart Price: </th>
                                <th> Sale qty: </th>
                                <th> Total: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_delivered_product = "select * from customer_orders where vendor_id='$vendor_id' and order_status='Delivered'";
                                $run_delivered_product = mysqli_query($conn, $get_delivered_product);          
                                while($row_delivered_product=mysqli_fetch_array($run_delivered_product)){   
                                    $pro_id = $row_delivered_product['pro_id'];
                                        $get_pro = "select * from products where id='$pro_id'";
                                        $run_pro = mysqli_query($conn, $get_pro);
                                        $row_pro = mysqli_fetch_array($run_pro);
                                        $pro_name = $row_pro['p_title'];
                                        $pro_price = $row_pro['p_price'];
                                        $mart_price = $row_pro['mart_price'];
                                        $pro_img = $row_pro['p_img'];
                                    $sale_qty = $row_delivered_product['qty'];
                                    $invoice = $row_delivered_product['invoice_no'];
                                    $date = date("d/m/y", strtotime($row_delivered_product["order_date"]));
                                    $total = $mart_price * $sale_qty ;
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $pro_name; ?> </td>
                                <td> <img src="../images/product_images/<?php echo $pro_img; ?>" width="60" height="60"></td>
                                <td><?php echo $invoice; ?></td>
                                <td> <?php echo $date; ?> </td>
                                <td> ৳ <?php echo $pro_price; ?> </td>
                                <td> ৳ <?php echo $mart_price; ?> </td>
                                <td> <?php echo $sale_qty; ?> </td>
                                <td> ৳ <?php echo $total; ?> </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->