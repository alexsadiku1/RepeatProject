<?php
session_start();

if(!isset($_SESSION['email'])){
	echo "<script>window.open('login.php?not_admin=Access Denied!','_self')</script>";
}
else{
	

	
	




?>
<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->

<?php
include("Includes/db.php");

if(isset($_GET['delete_product'])){
	
	$delete = $_GET['delete_product'];
	
	$delete_product = "delete from products where product_ID ='$delete'";
	
	$run_delete= mysqli_query($con,$delete_product);
	
	
	if($run_delete){
		
		echo "<script>alert('Product Deleted!')</script>";
		echo "<script>window.open('index.php?view_products','_self')</script>";
	}
}







}

?>