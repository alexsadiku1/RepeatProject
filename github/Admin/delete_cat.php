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

if(isset($_GET['delete_cat'])){
	
	$delete = $_GET['delete_cat'];
	
	$delete_cat = "delete from categories where cat_id ='$delete'";
	
	$run_delete= mysqli_query($con,$delete_cat);
	
	
	if($run_delete){
		
		echo "<script>alert('Category Deleted!')</script>";
		echo "<script>window.open('index.php?view_cat','_self')</script>";
	}
}


}






?>