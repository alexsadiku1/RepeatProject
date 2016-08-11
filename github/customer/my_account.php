<?php
session_start();
include("functions/functions.php");



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
<li><a href="../index.php"> Home</a></li>
<li><a href="..//all_products.php"> All Products</a></li>
<li><a href="customer/my_account.php"> My Account</a></li>
<li><a href="#"> Contact Us</a></li>
<li><a href="#"> Shopping Cart</a></li>
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
<div id="sidebar_title">My Account</div>
<ul id ="filters">
<?php
$user =$_SESSION['customer_email'];
$get_img= "select * from customers where customer_email='$user'";
$run_img= mysqli_query($con,$get_img);
$row_img=mysqli_fetch_array($run_img);

$c_image=$row_img['customer_image'];
$c_name = $row_img['customer_name'];
//display image
echo "<p style='text-align:center;'><img src='customer_images/$c_image' width='150' height='150'/></p>";


?>
<li><a href="my_account.php?my_orders"> My Orders</a></li>
<li><a href="my_account.php?edit_account"> Edit Account</a></li>
<li><a href="my_account.php?change_pass"> Change Password</a></li>
<li><a href="my_account.php?delete">Delete Account</a></li>
<li><a href="../logout.php">Log Out</a></li>

<ul>

</div>

<div id="content_area">
<?php cart();
?>
<div id="shopping_cart">

<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
<?php
if(isset($_SESSION['customer_email'])){
	
	echo"<b>Welcome: </b>". $_SESSION['customer_email'];
	
}

?>


<?php
if(!isset($_SESSION['customer_email'])){
	
	echo"<a href='checkout.php' style='color:yellow'>Login</a>";
	
	
}else{
	echo"<a href='../logout.php' style='color:yellow'>Logout</a>";
}


?>


</span>

</div>
<?php

//echo $ip=
getIp();

?>

<div id="products_area">



<?php
if(!isset($_GET['my_orders'])){
	if(!isset($_GET['edit_account'])){
		if(!isset($_GET['change_pass'])){
			if(!isset($_GET['delete'])){
				
	echo"
	<h2 style='passing:20px;'>Welcome: $c_name;</h2>
	<b>You can see your orders progess by clicking this link<a href='my_account.php>my_orders'> Orders</a></b>";
}
}
}
}

?>
<?php
if(isset($_GET['edit_account'])){
	
	include("edit_account.php");
	
	
}
if(isset($_GET['change_pass'])){
	
	include("change_pass.php");
	
}
	if(isset($_GET['delete'])){
	
	include("delete.php");
	
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