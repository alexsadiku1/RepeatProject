<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<?php
//session_start();



	
	




?>

<!DOCTYPE>
<?php
include("Includes/db.php")

?>
<html>
<head>
<title>Inserting Product</title>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</head>
<body bgcolor="#3380CC">


<form action="insert_product.php" method="post" enctype="multipart/form-data">

<table align="center" width="795" border="2" bgcolor="#3380CC">

<tr align="center">
<td colspan="5"><h2>Insert New Product</h2></td>
</tr>
<tr>
<td align="right">Product Name</td>
<td><input type="text" name="product_name" size="60" required/></td>
</tr>

<tr>
<td align="right">Product Category</td>
<td>
<select name="product_cat">
<option>Select Category</option>
<?php

$get_cats = "select * from categories";
	//variable with query and connection
	$run_cats = mysqli_query($con, $get_cats);
	
	while ($row_cats = mysqli_fetch_array($run_cats)){
		
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_name'];
		
		
		echo"<option value='$cat_id'>$cat_title</option>";
		
	}
?>
</select>
</td>
</tr>

<tr>
<td align="right">Product Image</td>
<td><input type="file" name="product_image"required/></td>
</tr>

<tr>
<td align="right">Product Price</td>
<td><input type="text" name="product_price" required/></td>
</tr>

<tr>
<td align="right">Product Description</td>
<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
</tr>


<tr align="center">
<td colspan="5"><input type="submit" name="insert_post" value="Submit"/></td>
</tr>

</table>



</body>
</html>
<?php
//if the button is clicked execute function
if(isset($_POST['insert_post'])){
	//getting text data from fields
	$product_name = $_POST['product_name'];
	$product_cat = $_POST['product_cat'];
	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	
	//getting image from field
	$product_image = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image'] ['tmp_name'];
	
	move_uploaded_file($product_image_tmp,"product_images/$product_image");
	
	$insert_product = "insert into products 
	(product_name,product_cat,product_desc,product_price,product_image) 
	values 
	('$product_name','$product_cat','$product_desc','$product_price','$product_image')";

	
	$insert_item = mysqli_query($con, $insert_product);
	
	if($insert_item){
		
		echo "<script>alert('Submit Complete')</script>";
		echo "<script>window.open('index.php?insert_product','_self')</script>";
	
	}
}





?>