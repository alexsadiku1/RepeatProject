<!DOCTYPE>
<?php
include("functions/functions.php");



?>
<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<html>
<head>
<title> One Stop </title>

<link rel="stylesheet" href="styles/style.css" media="all"
</head>
<body>


<!--Main Container Starts here-->
<div class ="main_wrapper">

<!--Header Starts here-->
<div class="header_wrapper" >

<img id="logo" src="images/logo.gif"/>

</div>
<!--Header ends here-->
<!--Menubar Starts here-->
<div class="menubar">

<ul id="menu">
<li><a href="index.php"> Home</a></li>
<li><a href="all_products.php"> All Products</a></li>
<li><a href="contact.php"> Contact Us</a></li>
<li><a href="cart.php"> Shopping Cart</a></li>
<li><a href="Admin/login.php"> Admin</a></li>
</ul>

<div id="form">
<form method="get" action="results.php" enctype="multipart/form-data">
<input type="text" name="user_query" placeholder="Search Product" />
<input type="submit" name="search" value ="Search" />
</form>
</div>

</div>
<!--Menubar Ends here-->


<!--Content area Starts here-->

<div class="content_wrapper">

<div id="sidebar">
<div> <h2 style="font-family: ARIAL BLACK">Filters</h2></div>
<div id="sidebar_title">Categories</div>


<ul id ="filters">

<?php getCats();?>
<!--
<select>
<option value="1"> Laptops</option>
<option value="2"> Mobiles</option>
<option value="3"> Camera</option>
<option value="4"> Accessories</option>
</select>-->





<ul>

</div>

<div id="content_area">

<div id="shopping_cart">

<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
<?php
if(isset($_SESSION['customer_email'])){
	
	echo"<b>Welcome: </b>". $_SESSION['customer_email'];
	
}
else{
		echo"<b>Welcome Guest </b>";
}

?>

<a href="cart.php"><b style="color:yellow">Shopping Cart </b></a> Total Items: <?php total_items();?> Total Price: &euro; <?php total_price(); ?>
<?php
if(!isset($_SESSION['customer_email'])){
	
	echo"<a href='checkout.php' style='color:yellow'>Login</a>";
	
	
}else{
	echo"<a href='logout.php' style='color:yellow'>Logout</a>";
}


?>


</span>

</div>


<div id="products_area">
<?php

if(isset($_GET['search'])){

	$search_query = $_GET['user_query'];

	$get_products = "select * from products where product_name like '%$search_query%'";
	
	$run_products = mysqli_query($con, $get_products);
	
	$count_products = mysqli_num_rows($run_products);
	
	if($count_products==0){
		echo "<h2>No results found!</h2>";
		exit();
	}
	
	while($row_pro= mysqli_fetch_array($run_products)){
		
		$pro_id = $row_pro['product_ID'];
		$pro_cat = $row_pro['product_cat'];
		$pro_name = $row_pro['product_name'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		
		
		echo"
		<div id ='single_product'>
		
		<h3>$pro_name</h3>
		<img src ='Admin/product_images/$pro_image' width='180 height='180'/>
		<p><b> &euro; $pro_price</b></p>
		<a href ='details.php?pro_id=$pro_id'><button style='float:left;'> Details</button></a>
		
		
		<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to cart</button></a>
		</div>
		
		";
		
		
	}
}
?>

</div>


</div>

</div>
<!--Content area Ends here-->


<div id="footer">
<h2 style="text-align:center: padding-top:30px;">&copy; alexandrosadikurepeat.com</h2>

</div>
</div>
<!--Main Container Ends here-->

</body>
</html>