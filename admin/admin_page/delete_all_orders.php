<?php

if(isset($_GET['delete_all_orders'])){
    $delete_id=$_GET['delete_all_orders'];
    
    //delete query
    $delete_product="Delete from `orders` where order_id=$delete_id";
    $result_product=mysqli_query($con,$delete_order);
    if($result_orders){
        echo "<script>alert('Order deleted successfully')</script>";
        echo "<script>window.open('index_admin.php', '_self')</script>";
    }
}
?>