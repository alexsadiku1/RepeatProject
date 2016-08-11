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
<td colspan="6"><h2>View All Catogries</h2></td>
</tr>

<tr align="center" border="2" bgcolor="white">
<th>Category ID</th>
<th>Title</th>
<th>Delete</th>
</tr>
<?php

include("Includes/db.php");

$get_cat = "select * from categories";

$run_cat = mysqli_query($con, $get_cat);

$i=0;

while($row_cat=mysqli_fetch_array($run_cat)){

	$cat_id = $row_cat['cat_id'];
	$cat_title = $row_cat['cat_name'];
	$i++;
	



?>

<tr align="center">
<td><?php echo $cat_id;?></td>
<td><?php echo $cat_title;?></td>
<td><a href="delete_cat.php?delete_cat=<?php echo $cat_id;?>">Delete</a></td>
</tr>
<?php }}?>

</table>