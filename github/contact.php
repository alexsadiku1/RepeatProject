<?php
session_start();
include("functions/functions.php");



?>
<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<!DOCTYPE>
<html>
<head>
<title> One Stop </title>

<link rel="stylesheet" href="styles/style.css" media="all"/>
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
<input id="searchbox"type="text" name="user_query" placeholder="Search Product" />
<input type="submit" name="search"  value ="Search" />
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
<h1>Contact Us at</h1>
<h2>Email: asadiku1@hotmail.com</h2>
<h2>Phone: 0852838598</h2>
<!--Link to Mock facebook-->
<a href="https://www.facebook.com/1stop-1139041116152396/?skip_nax_wizard=true">
<img border="0" width="50" height="50" alt="Facebook" src="images/facebook.jpg" width="100" height="100">
</a>


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
