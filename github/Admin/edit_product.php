<?php
session_start();

if(!isset($_SESSION['email'])){
	echo "<script>window.open('login.php?not_admin=Access Denied!','_self')</script>";
}
else{
	

	
	




?>
<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<!DOCTYPE>
<?php
include("Includes/db.php");

if(isset($_GET['edit_product'])){
	
	$get_id = $_GET['edit_product'];
	
	$get_products = "select * from products where product_ID='$get_id'";

$run_products = mysqli_query($con, $get_products);

	$row_products=mysqli_fetch_array($run_products);

	$product_id = $row_products['product_ID'];
	$product_title = $row_products['product_name'];
	$product_image = $row_products['product_image'];
	$product_price = $row_products['product_price'];
	$product_desc = $row_products['product_desc'];
	$product_cat = $row_products['product_cat'];
	
	$get_cat = "select * from categories where cat_id='$product_cat'";
	
	$run_cat= mysqli_query($con,$get_cat);
	
	$row_cat=mysqli_fetch_array($run_cat);
	
	$cat_name = $row_cat['cat_name'];
}
?>
<html>
<head>
<title>Edit Product</title>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</head>
<body bgcolor="#3380CC">


<form action="" method="post" enctype="multipart/form-data">

<table align="center" width="795" border="2" bgcolor="#00ccff">

<tr align="center">
<td colspan="5"><h2>Edit Product</h2></td>
</tr>
<tr>
<td align="right">Product Name</td>
<td><input type="text" name="product_name" size="60" value="<?php echo $product_title;?>" required/></td>
</tr>

<tr>
<td align="right">Product Category</td>
<td>
<select name="product_cat">
<option><?php echo $cat_name;?></option>
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
<td><input type="file" name="product_image"required/><img src="product_images/<?php echo $product_image;?>" width="60" height="60"/></td>
</tr>

<tr>
<td align="right">Product Price</td>
<td><input type="text" name="product_price" value="<?php echo $product_price;?>"required/></td>
</tr>

<tr>
<td align="right">Product Description</td>
<td><textarea name="product_desc" cols="20" rows="10"><?php echo $product_desc;?></textarea></td>
</tr>


<tr align="center">
<td colspan="5"><input type="submit" name="update_post" value="Submit"/></td>
</tr>

</table>



</body>
</html>
<?php
//if the button is clicked execute function
if(isset($_POST['update_post'])){
	
	$update_id = $product_id;
	//getting text data from fields
	$product_name = $_POST['product_name'];
	$product_cat = $_POST['product_cat'];
	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	
	//getting image from field
	$product_image = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image'] ['tmp_name'];
	
	move_uploaded_file($product_image_tmp,"product_images/$product_image");
	
	$update_product = "update products set product_cat='$product_cat',product_name='$product_name',
	product_price='$product_price',product_desc='$product_desc',product_image='$product_image'
	 where product_ID='$update_id'";

	
	$run_update = mysqli_query($con, $update_product);
	
	if($run_update){
		
		echo "<script>alert('Update Complete')</script>";
		echo "<script>window.open('index.php?view_products','_self')</script>";
	
	}
}

}



?>