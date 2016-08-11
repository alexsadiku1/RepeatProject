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
<td colspan="6"><h2>View All Products</h2></td>
</tr>

<tr align="center" border="2" bgcolor="white">
<th>S.N</th>
<th>Title</th>
<th>Image</th>
<th>Price</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php
//https://designscrazed.org/css-html-login-form-templates/
include("Includes/db.php");

$get_products = "select * from products";

$run_products = mysqli_query($con, $get_products);

$i=0;

while($row_products=mysqli_fetch_array($run_products)){

	$product_id = $row_products['product_ID'];
	$product_title = $row_products['product_name'];
	$product_image = $row_products['product_image'];
	$product_price = $row_products['product_price'];
	$i++;
	



?>

<tr align="center">
<td><?php echo $i;?></td>
<td><?php echo $product_title;?></td>
<td><img src="product_images/<?php echo $product_image;?>" width="60" height="60"/></td>
<td><?php echo $product_price;?></td>
<td><a href="index.php?edit_product=<?php echo $product_id;?>">Edit</a></td>
<td><a href="delete_product.php?delete_product=<?php echo $product_id;?>">Delete</a></td>
</tr>
<?php } }?>

</table>