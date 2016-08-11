<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<h2 style="text-align:center;">Change Your Password</h2>

<form action="" method="post">

<table align="center" width="600">

<tr>
<td align="right"><b>Enter Current Password:</b></td>
<td><input type="password" name="current_pass" required><br></td>
</tr>

<tr>
<td align="right"><b>Enter New Password:</b></td>
<td><input type="password" name="new_pass" required><br></td>
</tr>

<tr>
<td align="right"><b>Enter New Password Again:</b></td>
<td><input type="password" name="new_again" required><br></td>
</tr>

<tr align="center">
<td colspan="8"><input type="submit" name="change" value="Update"/></td>
</tr>
</table>

</form>

<?php

include("includes/db.php");
if(isset($_POST['change'])){
	
	$cust = $_SESSION['customer_email'];
	$current_pass = $_POST['current_pass'];
	$new_pass = $_POST['new_pass'];
	$new_again = $_POST['new_again'];
	
	$sel_pass = "select * from customers where customer_pass='$current_pass' AND customer_email='$user' ";
	
	$run_pass = mysqli_query($con, $sel_pass);
	
	$check_pass = mysqli_num_rows($run_pass);
	
	if($check_pass==0){
		echo "<script>alert('Current Password is Incorrect!')</script>";
		exit();
	}
	if($new_pass!=$new_again){
		echo "<script>alert('Passwords do not match!')</script>";
		echo "<script>alert('Passwords do not match!')</script>";
		exit();
	}
	else{
		$update_pass = "update customers set customer_pass ='$new_pass'";
		
		$run_update = mysqli_query($con,$update_pass);
		
		echo "<script>alert('Password Updateed!')</script>";
		
		echo "<script>window.open('my_account.php','_self')</script>";
	}
}

?>