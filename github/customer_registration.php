<?php
session_start();
include_once("functions/functions.php");



?>
<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<!DOCTYPE>
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
<?php cart();
?>
<div id="shopping_cart">

<span style="float:right; font-size:18px; padding:5px; line-height:40px;">


Welcome Guest!<a href="cart.php"><b style="color:yellow">Shopping Cart</b></a> Total Items:<?php total_items();?> Total Price: &euro; <?php total_price(); ?>

</span>

</div>


<form action ="customer_registration.php" method="post" enctype="multipart/form-data">
<table align="center" width="750px">

<tr align="center">
<td colspan="6"><h2>Create an Account</h2></td>
</tr>


<tr>
<td align="right">Name</td>
<td><input type="text" name="c_name" required/></td>
</tr>

<tr>
<td align="right">Email</td>
<td><input type="email" name="c_email" required/></td>
</tr>

<tr>
<td align="right">Password</td>
<td><input type="password" name="c_pass" required/></td>
</tr>

<td align="right">Picture</td>
<td><input type="file" name="c_image"/></td>
</tr>

<td align="right">Number</td>
<td><input type="text" name="c_number" required/></td>
</tr>

<tr>
<td align="right">Country</td>
<td><select name="c_country" required/>
<option>Select a Country</option>
<option>Ireland</option>
<option>America</option>
<option>France</option>
<option>Germany</option>
<option>Italy</option>
<option>Spain</option>
</select>
</td>
</tr>

<tr>
<td align="right">City</td>
<td><input type="text" name="c_city" required/></td>
</tr>


<td align="right">Address</td>
<td><input type="text" name="c_address" required/></td>
</tr>


<tr align="center">
<td colspan="6"><input type="submit" name="register" value="Submit"/></td>
</tr>
</table>
</form>

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
<?php

if(isset($_POST['register'])){

        function getIp() {
    $c_ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $c_ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $c_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $c_ip;
}
    


	global $con;
	
	$ip = getIp();
	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_pass = $_POST['c_pass'];
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];
	$c_country = $_POST['c_country'];
	$c_city = $_POST['c_city'];
	$c_address = $_POST['c_address'];
	$c_number = $_POST['c_number'];
	
	move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
	
	$insert_cust = "insert into customers
	(customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city, customer_number,customer_image,customer_add)
	values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_number','$c_image','$c_address')";
	
	$run_cust = mysqli_query($con,$insert_cust);
	
	
	$select_cart = "select * from cart where ip_add='$ip'";
	
	$run_cart = mysqli_query($con, $select_cart);
	
	$check_cart = mysqli_num_rows($run_cart);
	
	if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email;
		
		
		echo"<script>alert('Registration Complete)</script>";
		echo"<script>window.open('customer/my_account.php',''_self)</script>";
		
	}
	else{
		$_SESSION['customer_email']=$c_email;
		
		
		echo"<script>alert('Registration Complete)</script>";
		echo"<script>window.open('customer/checkout.php','_self')</script>";
		
	}
	
	if($run_cust){
		
		echo"<script>alert('Registration Complete')</script>";
                echo"<script>window.open('customer/my_account.php','_self')</script>";
}
}



?>