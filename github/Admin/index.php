<?php
session_start();

if(!isset($_SESSION['email'])){
	echo "<script>window.open('login.php?not_admin=Access Denied!','_self')</script>";
}
else{
	

	
	




?>
<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->


<!DOCTYPE>

<html>
<head>
<title> Admin Area </title>

<link rel="stylesheet" href="styles/styles.css" media="all"/>
</head>
<body>
<div class="main_wrapper">
<div id="header">
<img id="logo" src="Images/1stopadmin.gif"/>
<div id="right">
<h2 style="text-align:center; "> Manager Content</h2>
<a href="index.php?insert_product">Insert Product</a>
<a href="index.php?view_products">View Products</a>
<a href="index.php?insert_cat">New Category</a>
<a href="index.php?view_cat">View All Categories</a>
<a href="index.php?view_customers">View Customers</a>
<a href="../logout.php">Logout</a>
</div>
<div id="left">
<?php
if(isset($_GET['insert_product'])){
	include("insert_product.php");
}

if(isset($_GET['view_products'])){
	include("view_products.php");
}


if(isset($_GET['edit_product'])){
	include("edit_product.php");
}

if(isset($_GET['insert_cat'])){
	include("insert_cat.php");
}

if(isset($_GET['view_cat'])){
	include("view_cat.php");
}

if(isset($_GET['view_customers'])){
	include("view_customers.php");
}

}

?>

</div>

</div>
</div>

</body>
</html>
