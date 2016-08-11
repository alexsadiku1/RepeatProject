<?php
session_start();
include_once("functions/functions.php");



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
        echo"<a href='logout.php' style='color:yellow'>Logout  </a>";
        echo"<a href='customer/my_account.php' style='color:yellow'>  My Account</a>";
}


?>


</span>

</div>


<div id="products_area">
<br>
<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="700" bgcolor="white">


<tr align="center">
<th>Remove</th>
<th>Product(s)</th>
<th>Quantity</th>
<th>Item Price: &euro;</th>
</tr>

<?php

        function getIp() {
    $c_ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $c_ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $c_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $c_ip;
}
    

$total = 0;
	
	global $con;

   $ip=getIp();
   
   $sel_price = "select * from cart where ip_add='$ip'";
   
   $run_price = mysqli_query($con, $sel_price);
   
  // if (!$check1_res) {
   // printf("Error: %s\n", mysqli_error($con));
  //  exit();
  //}
   
   while($p_price=mysqli_fetch_array($run_price)){
	   
	   $pro_id = $p_price['p_id'];
	   
	   $pro_price = "select * from products where product_id='$pro_id'";
	   
	   $run_pro_price = mysqli_query($con,$pro_price);
	   
	   while($pp_price = mysqli_fetch_array($run_pro_price)){
		   
		   //taken all values into a single array to add them together
		   $product_price = array($pp_price['product_price']);
		   $product_name = $pp_price['product_name'];
		   
		   $product_image = $pp_price['product_image'];
		   //individual product price
		   $single_price = $pp_price['product_price'];
		   
		   $values = array_sum($product_price);
		   $total += $values;

	//echo $total;


?>


<tr align="center">

<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"></td>
<td><?php echo $product_name?><br>
<img src="Admin/product_images/<?php echo $product_image?>" width="60" height="60"/>

</td>
<td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty'];?>"/></td>


<?php

//if update_cart is pressed do the following
if(isset($_POST['update_cart'])){
	
	//get qty from the input
	$qty = $_POST['qty'];
	
	$update_qty = "update cart set qty ='$qty'";
	$run_qty = mysqli_query($con, $update_qty);
	
	//must use session super global array to keep value in the box
	$_SESSION['qty'] = $qty;
	
	$total = $total*$qty;
}

?>

<td><?php echo "&euro;" . $single_price;?></td>


</tr>



   <?php }} ?>
   
   <tr align="right">

<td colspan="4"><b>Subtotal: &euro; </b></td>
<td colspan="4"><?php  echo $total; ?> </td>
</tr>



<tr align="center">
<td colspan="2"><input type="submit" name="delete" value="Delete"/></td>
<td><input type="submit" name="update_cart" value="Update Quantity"/></td>
<td><input type="submit" name="continue" value="Continue Shopping"/></td>
<td><a href="checkout.php" style="text-decoration:none" color:black;><button>Checkout</a></td>
</tr>
</table>




</form>


<?php

global $con;

$ip = getIp();

if(isset($_POST['delete'])){
	foreach($_POST['remove']as $remove_id){
		
		$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";


		$run_delete = mysqli_query($con, $delete_product);
		
		if($run_delete){
			
			echo "<script>window.open('cart.php','_self')</script>";
		}
	}
	
}

if(isset($_POST['continue'])){
	echo "<script>window.open('index.php','_self')</script>";
}

//if function isn't selected it won't generate an error


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