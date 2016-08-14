<?php
session_start();
include("includes/db.php");
include_once("functions/functions.php");

?>
<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<div>
<form method="post" action="">
<table width="500" align ="center" bgcolor="#3380CC">

<tr align="center">
<td colspan="4"><h2>Login or Register to Buy!</h2></td>

</tr>

<tr>
<td align ="right"><b> Email: </b></td>
<td><input type="email" name="email" placeholder="enter email" required/></td>
</tr>


<tr>
<td align="right"> Password: </td>
<td><input type="password" name="pass" placeholder="enter passowrd" required/></td>
</tr>

<tr align="center">
<td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
</tr>

<tr align="right">
<td colspan="4"><input type="submit" name="login" value="Login"/></td>
</tr>






</table>

<h2 style="float:right; padding:20px; "><a href="customer_registration.php" style="text-decoration:none;">Not Registered? </a></h2>

</form>

<?php
if(isset($_POST['login'])){
	
        
        function getIp() {
    $c_ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $c_ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $c_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $c_ip;
}
        //connection to database
   $mysql_host = "fdb12.atspace.me";
$mysql_database = "2173748_alex";
$mysql_user = "2173748_alex";
$mysql_password = "Alexander1";

//connection variable with all parameters
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_password,$mysql_database)or die(mysql_error());
        
	$c_email = $_POST['email'];
	$c_pass = $_POST['pass'];
	
	$select_cust = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
	
	$run_cust = mysqli_query($con, $select_cust);
	
	$check_customer = mysqli_num_rows($run_cust);
	
	if($check_customer==0){
		echo "<script>alert('Password or email is incorrect')</script>";
                exit();
	}
        
	$c_ip = getIp();
	
	$select_cart = "select * from cart where ip_add='$c_ip'";
	
	$run_cart = mysqli_query($con, $select_cart);
	
	$check_cart = mysqli_num_rows($run_cart);

	if($check_customer>0 AND $check_cart==0){
		
		$_SESSION['customer_email']=$c_email;
		
		echo"<script>alert('Login Succesful!')</script>";
		echo"<script>window.open('customer/my_account.php','_self')</script>";
		exit();
	}
	else{
		$_SESSION['customer_email']=$c_email;
		
		echo"<script>alert('Login Succesful!')</script>";
		echo"<script>window.open('checkout.php',''_self')</script>";

	}
}




?>

</div>
