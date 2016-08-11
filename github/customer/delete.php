<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<br>
<h2 style="text-align:center;">Are you sure you want to delete your account?</h2>

<form action="" method="post">

<br>
<input type="submit" name="yes" value ="Yes"/>

<input type="submit" name="no" value ="No"/>

</form>

<?php
include("includes/db.php");

$user = $_SESSION['customer_email'];

if(isset($_POST['yes'])){
	
	$delete = "delete from customers where customer_email='$user'";
	
	$run_delete = mysqli_query($con,$delete);
	
	echo"<script>alert('Account deleted!')</script>";
	echo"<script>window.open('../logout.php','_self')</script>";
	//echo"<script>window.open('../index.php','_self')</script>";
}

if(isset($_POST['no'])){

	echo"<script>alert('Account not deleted')</script>";
	echo"<script>window.open('my_account.php','_self')</script>";
}
















?>