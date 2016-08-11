<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<?php
//session_start();

if(!isset($_SESSION['email'])){
	echo "<script>window.open('login.php?not_admin=Access Denied!','_self')</script>";
}
else{
	

	
	




?>

<table width="795" align="center" bgcolor="#3380CC">

<tr align="center">
<td colspan="6"><h2>View Users</h2></td>
</tr>

<tr align="center" border="2" bgcolor="white">
<th>Customer ID</th>
<th>Name</th>
<th>Email</th>
<th>Number</th>
<th>Address</th>
<th>City</th>
<th>Country</th>
<th>Image</th>
<th>Delete</th>
</tr>
<?php

include("Includes/db.php");

$get_cust = "select * from customers";

$run_cust = mysqli_query($con, $get_cust);

$i=0;

while($row_cust=mysqli_fetch_array($run_cust)){

	$cust_id = $row_cust['customer_id'];
	$cust_name = $row_cust['customer_name'];
	$cust_email = $row_cust['customer_email'];
	$cust_number = $row_cust['customer_number'];
	$cust_add = $row_cust['customer_add'];
	$cust_city = $row_cust['customer_city'];
	$cust_country = $row_cust['customer_country'];
	$cust_image = $row_cust['customer_image'];
	$i++;
	



?>

<tr align="center">
<td><?php echo $cust_id;?></td>
<td><?php echo $cust_name;?></td>
<td><?php echo $cust_email;?></td>
<td><?php echo $cust_number;?></td>
<td><?php echo $cust_add;?></td>
<td><?php echo $cust_city;?></td>
<td><?php echo $cust_country;?></td>
<td><img src="../customer/customer_images/<?php echo $cust_image;?>" width="60" height="60"/></td>
<td><a href="delete_cust.php?delete_cust=<?php echo $cust_id;?>">Delete</a></td>
</tr>
<?php } }?>

</table>